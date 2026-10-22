<?php

namespace App\Http\Controllers\Admin;

use App\Exports\SurveysExport;
use App\Http\Controllers\Controller;
use App\Models\Survey;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use Symfony\Component\HttpFoundation\BinaryFileResponse;

class SurveyAdminController extends Controller
{
    public function index(Request $request)
    {
        $surveys = Survey::query()
            ->filter($request)
            ->latest()
            ->paginate(15)
            ->withQueryString();

        return view('admin.surveys.index', [
            'surveys' => $surveys,
            'trainingUnits' => Survey::trainingUnits(),
            'provinces' => Survey::provinces(),
            'filters' => $request->only(['training_unit', 'destination_province', 'q']),
        ]);
    }

    public function export(Request $request): BinaryFileResponse
    {
        $filename = 'khao-sat-ve-que-an-tet-'.now()->format('Ymd_His').'.xlsx';

        return Excel::download(new SurveysExport($request), $filename);
    }
}
