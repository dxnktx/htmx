<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSurveyRequest;
use App\Models\Survey;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class SurveyController extends Controller
{
    public function create(): View
    {
        return view('survey.form', [
            'trainingUnits' => Survey::trainingUnits(),
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

        if ($data['training_unit'] !== Survey::OTHER) {
            $data['training_unit_other'] = null;
        }

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
