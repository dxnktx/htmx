<?php

namespace App\Http\Requests;

use App\Models\Survey;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreSurveyRequest extends FormRequest
{
    protected $redirectRoute = 'survey.create';

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
            'email' => ['required', 'email', 'max:255'],
            'unit_id' => ['nullable', 'integer', 'exists:units,id'],
            'university_other' => ['nullable', 'required_without:unit_id', 'string', 'max:255'],
            'student_year' => ['required', 'string', Rule::in(array_keys(Survey::studentYears()))],
            'current_residence' => ['required', 'string', 'max:255'],
            'family_situation' => ['required', 'string', Rule::in(array_keys(Survey::familySituations()))],
            'family_situation_other' => ['nullable', 'required_if:family_situation,'.Survey::OTHER, 'string', 'max:255'],
            'destination_province' => ['required', 'string', Rule::in(array_keys(Survey::provinces()))],
            'departure_time_range' => ['required', 'string', Rule::in(array_keys(Survey::departureTimes()))],
            'departure_time_other' => ['nullable', 'required_if:departure_time_range,'.Survey::DEPARTURE_TIME_OTHER, 'date_format:Y-m-d'],
            'support_type' => ['nullable', 'string', Rule::in(array_keys(Survey::supportTypes()))],
            'student_note' => ['nullable', 'string', 'max:1000'],
            'is_agreed' => ['required', 'accepted'],
        ];
    }

    /**
     * @return array<string, string>
     */
    public function attributes(): array
    {
        return [
            'full_name' => 'họ và tên',
            'email' => 'email',
            'unit_id' => 'đơn vị đào tạo',
            'university_other' => 'đơn vị đào tạo khác',
            'student_year' => 'sinh viên năm thứ mấy',
            'current_residence' => 'chỗ ở hiện tại',
            'family_situation' => 'hoàn cảnh gia đình',
            'family_situation_other' => 'hoàn cảnh gia đình khác',
            'destination_province' => 'tỉnh thành',
            'departure_time_range' => 'thời gian mong muốn khởi hành',
            'departure_time_other' => 'ngày khởi hành khác',
            'support_type' => 'hình thức hỗ trợ mong muốn',
            'student_note' => 'mong muốn của sinh viên',
            'is_agreed' => 'đồng ý cung cấp thông tin',
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
            'date_format' => ':attribute phải có định dạng ngày/tháng/năm (dd/mm/yyyy).',
        ];
    }
}
