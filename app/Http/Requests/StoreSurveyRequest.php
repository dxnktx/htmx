<?php

namespace App\Http\Requests;

use App\Models\Survey;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreSurveyRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    /**
     * @return array<string, mixed>
     */
    public function rules(): array
    {
        return [
            'full_name' => ['required', 'string', 'max:255'],
            'unit_id' => ['nullable', 'integer', 'exists:units,id'],
            'university_other' => ['nullable', 'required_without:unit_id', 'string', 'max:255'],
            'student_year' => ['required', 'string', Rule::in(array_keys(Survey::studentYears()))],
            'current_residence' => ['required', 'string', 'max:255'],
            'family_situation' => ['required', 'string', Rule::in(array_keys(Survey::familySituations()))],
            'family_situation_other' => ['nullable', 'required_if:family_situation,'.Survey::OTHER, 'string', 'max:255'],
            'destination_province' => ['required', 'string', Rule::in(array_keys(Survey::provinces()))],
            'departure_time' => ['required', 'string', Rule::in(array_keys(Survey::departureTimes()))],
            'support_type' => ['required', 'string', Rule::in(array_keys(Survey::supportTypes()))],
        ];
    }

    /**
     * @return array<string, string>
     */
    public function attributes(): array
    {
        return [
            'full_name' => 'họ và tên',
            'unit_id' => 'đơn vị đào tạo',
            'university_other' => 'đơn vị đào tạo khác',
            'student_year' => 'sinh viên năm thứ mấy',
            'current_residence' => 'chỗ ở hiện tại',
            'family_situation' => 'hoàn cảnh gia đình',
            'family_situation_other' => 'hoàn cảnh gia đình khác',
            'destination_province' => 'tỉnh thành',
            'departure_time' => 'thời gian mong muốn khởi hành',
            'support_type' => 'hình thức hỗ trợ mong muốn',
        ];
    }

    /**
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'required' => 'Vui lòng nhập :attribute.',
            'required_if' => 'Vui lòng ghi rõ :attribute khi chọn "Khác".',
            'required_without' => 'Vui lòng nhập :attribute khi chưa chọn đơn vị đào tạo.',
            'in' => ':attribute không hợp lệ.',
            'max' => ':attribute không được vượt quá :max ký tự.',
        ];
    }
}
