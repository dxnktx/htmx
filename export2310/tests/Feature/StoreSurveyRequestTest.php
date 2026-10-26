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

    public function test_departure_date_is_required_and_must_be_a_valid_calendar_date_when_other_is_selected(): void
    {
        $data = $this->validSurveyData([
            'departure_time_range' => Survey::DEPARTURE_TIME_OTHER,
            'departure_time_other' => null,
        ]);
        $validator = Validator::make($data, (new StoreSurveyRequest)->rules());

        $this->assertTrue($validator->fails());
        $this->assertArrayHasKey('departure_time_other', $validator->errors()->toArray());

        $data['departure_time_other'] = '2027-02-30';
        $validator = Validator::make($data, (new StoreSurveyRequest)->rules());

        $this->assertTrue($validator->fails());
        $this->assertArrayHasKey('departure_time_other', $validator->errors()->toArray());
    }

    public function test_email_and_consent_are_required(): void
    {
        $data = $this->validSurveyData([
            'email' => null,
            'is_agreed' => null,
        ]);
        $validator = Validator::make($data, (new StoreSurveyRequest)->rules());

        $this->assertTrue($validator->fails());
        $this->assertArrayHasKey('email', $validator->errors()->toArray());
        $this->assertArrayHasKey('is_agreed', $validator->errors()->toArray());
    }

    public function test_other_departure_date_is_accepted_in_calendar_input_format(): void
    {
        $validator = Validator::make($this->validSurveyData([
            'departure_time_range' => Survey::DEPARTURE_TIME_OTHER,
            'departure_time_other' => '2027-12-31',
            'student_note' => 'Mong muốn của sinh viên',
        ]), (new StoreSurveyRequest)->rules());

        $this->assertFalse($validator->fails());
    }

    public function test_province_options_contain_34_destinations(): void
    {
        $this->assertCount(34, Survey::provinces());
    }

    /**
     * @param  array<string, mixed>  $overrides
     * @return array<string, mixed>
     */
    private function validSurveyData(array $overrides = []): array
    {
        return array_merge([
            'full_name' => 'Nguyen Van A',
            'email' => 'student@example.com',
            'unit_id' => null,
            'university_other' => 'Trường đại học khác',
            'student_year' => 'year_1',
            'current_residence' => 'KTX Khu A',
            'family_situation' => 'poor',
            'destination_province' => 'lam_dong',
            'departure_time_range' => '2026-01-12_15',
            'is_agreed' => '1',
        ], $overrides);
    }
}
