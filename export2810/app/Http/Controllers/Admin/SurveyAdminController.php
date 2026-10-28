<?php

namespace App\Http\Controllers\Admin;

use App\Exports\SurveysExport;
use App\Http\Controllers\Controller;
use App\Models\Survey;
use App\Models\Unit;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use Symfony\Component\HttpFoundation\BinaryFileResponse;

class SurveyAdminController extends Controller
{
    public function index(Request $request)
    {
        $query = Survey::query()->filter($request);
        $universityLabel = "COALESCE(units.ten_don_vi, surveys.university_other, 'Chưa xác định')";
        $universities = (clone $query)
            ->leftJoin('units', 'units.id', '=', 'surveys.unit_id')
            ->selectRaw($universityLabel.' as label, COUNT(*) as total')
            ->groupBy('surveys.unit_id', 'surveys.university_other', 'units.ten_don_vi')
            ->orderBy('label')
            ->get();

        $groupedCounts = function (string $column) use ($query) {
            return (clone $query)
                ->select($column)
                ->selectRaw('COUNT(*) as total')
                ->groupBy($column)
                ->get()
                ->keyBy($column);
        };

        $countsByProvince = $groupedCounts('destination_province');
        $countsBySupportType = $groupedCounts('support_type');
        $countsByDepartureTime = $groupedCounts('departure_time');

        $chartData = [
            'totalRegistrations' => (clone $query)->count(),
            'universities' => [
                'labels' => $universities->pluck('label')->all(),
                'values' => $universities->pluck('total')->map(fn ($total) => (int) $total)->all(),
            ],
            'provinces' => [
                'labels' => $countsByProvince->keys()
                    ->map(fn ($value) => Survey::provinces()[$value] ?? $value)
                    ->all(),
                'values' => $countsByProvince->pluck('total')->map(fn ($total) => (int) $total)->all(),
            ],
            'supportTypes' => [
                'labels' => $countsBySupportType->keys()
                    ->map(fn ($value) => Survey::supportTypes()[$value] ?? $value)
                    ->all(),
                'values' => $countsBySupportType->pluck('total')->map(fn ($total) => (int) $total)->all(),
            ],
            'departureTimes' => [
                'labels' => $countsByDepartureTime->keys()
                    ->map(fn ($value) => Survey::departureTimes()[$value] ?? $value)
                    ->all(),
                'values' => $countsByDepartureTime->pluck('total')->map(fn ($total) => (int) $total)->all(),
            ],
        ];

        $surveys = (clone $query)
            ->with('unit')
            ->latest()
            ->paginate(15)
            ->withQueryString();

        return view('admin.surveys.index', [
            'chartData' => $chartData,
            'surveys' => $surveys,
            'units' => Unit::query()->select('id', 'ten_don_vi')->get(),
            'provinces' => Survey::provinces(),
            'filters' => $request->only(['unit_id', 'destination_province', 'q']),
        ]);
    }

    public function export(Request $request): BinaryFileResponse
    {
        $filename = 'khao-sat-ve-que-an-tet-'.now()->format('Ymd_His').'.xlsx';

        return Excel::download(new SurveysExport($request), $filename);
    }

    public function destroy(Request $request, Survey $survey): RedirectResponse
    {
        $survey->delete();

        return redirect()
            ->route('admin.surveys.index', $request->only(['unit_id', 'destination_province', 'q']))
            ->with('success', 'Đã xóa bản ghi khảo sát.');
    }
}
