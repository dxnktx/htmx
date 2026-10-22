<?php

namespace Tests\Feature;

use App\Http\Requests\StoreSurveyRequest;
use App\Models\Survey;
use Illuminate\Support\Facades\Validator;
use Tests\TestCase;

class StoreSurveyRequestTest extends TestCase
{
    public function test_training_unit_other_is_required_when_other_training_unit_is_selected(): void
    {
        $validator = Validator::make($this->validSurveyData([
            'training_unit' => Survey::OTHER,
        ]), (new StoreSurveyRequest)->rules());

        $this->assertTrue($validator->fails());
        $this->assertArrayHasKey('training_unit_other', $validator->errors()->toArray());
    }

    public function test_family_situation_other_is_required_when_other_family_situation_is_selected(): void
    {
        $validator = Validator::make($this->validSurveyData([
            'family_situation' => Survey::OTHER,
        ]), (new StoreSurveyRequest)->rules());

        $this->assertTrue($validator->fails());
        $this->assertArrayHasKey('family_situation_other', $validator->errors()->toArray());
    }

    /**
     * @param  array<string, string>  $overrides
     * @return array<string, string>
     */
    private function validSurveyData(array $overrides = []): array
    {
        return array_merge([
            'full_name' => 'Nguyen Van A',
            'training_unit' => 'bach_khoa',
            'student_year' => 'year_1',
            'current_residence' => 'KTX Khu A',
            'family_situation' => 'poor',
            'destination_province' => 'lam_dong',
            'departure_time' => '2026-01-12_15',
            'support_type' => 'bus_seat',
        ], $overrides);
    }
}
