<?php

namespace Tests\Feature;

use App\Http\Requests\StoreSurveyRequest;
use App\Models\Survey;
use Illuminate\Support\Facades\Validator;
use Tests\TestCase;

class StoreSurveyRequestTest extends TestCase
{
    public function test_university_other_is_required_when_no_unit_is_selected(): void
    {
        $validator = Validator::make($this->validSurveyData([
            'university_other' => null,
        ]), (new StoreSurveyRequest)->rules());

        $this->assertTrue($validator->fails());
        $this->assertArrayHasKey('university_other', $validator->errors()->toArray());
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
     * @param  array<string, mixed>  $overrides
     * @return array<string, mixed>
     */
    private function validSurveyData(array $overrides = []): array
    {
        return array_merge([
            'full_name' => 'Nguyen Van A',
            'unit_id' => null,
            'university_other' => 'Trường đại học khác',
            'student_year' => 'year_1',
            'current_residence' => 'KTX Khu A',
            'family_situation' => 'poor',
            'destination_province' => 'lam_dong',
            'departure_time' => '2026-01-12_15',
            'support_type' => 'bus_seat',
        ], $overrides);
    }
}
