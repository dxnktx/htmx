<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSurveyRequest;
use App\Models\Survey;
use App\Models\Unit;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class SurveyController extends Controller
{
    public function create(): View
    {
        return view('survey.form', [
            'units' => Unit::query()->select('id', 'ten_don_vi')->get(),
            'studentYears' => Survey::studentYears(),
            'familySituations' => Survey::familySituations(),
            'provinces' => Survey::provinces(),
            'departureTimes' => Survey::departureTimes(),
            'supportTypes' => Survey::supportTypes(),
            'otherValue' => Survey::OTHER,
        ]);
    }

    public function store(StoreSurveyRequest $request): RedirectResponse
    {
        $data = $request->validated();
        $departureTime = $data['departure_time_range'];
        unset($data['departure_time_range']);
        $data['departure_time'] = $departureTime;

        if ($departureTime !== Survey::DEPARTURE_TIME_OTHER) {
            $data['departure_time_other'] = null;
        } else {
            $data['departure_time_other'] = \Illuminate\Support\Carbon::createFromFormat(
                '!Y-m-d',
                $data['departure_time_other']
            )->format('d/m/Y');
        }

        $data['support_type'] ??= array_key_first(Survey::supportTypes());
        $data['is_agreed'] = true;

        if (!empty($data['unit_id'])) {
            $data['university_other'] = null;
        }

        $data['training_unit'] = null;
        $data['training_unit_other'] = null;

        if ($data['family_situation'] !== Survey::OTHER) {
            $data['family_situation_other'] = null;
        }

        $data['user_id'] = $request->user()?->id;
        $data['ip_address'] = $request->ip();

        Survey::create($data);

        return redirect()->route('survey.success');
    }

    public function success(): View
    {
        return view('survey.success');
    }
}
