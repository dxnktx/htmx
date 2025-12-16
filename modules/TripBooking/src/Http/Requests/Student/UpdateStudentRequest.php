<?php

namespace Modules\TripBooking\src\Http\Requests\Student;

use Modules\TripBooking\src\Http\Requests\BaseFormRequest;

class UpdateStudentRequest extends BaseFormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return array_merge(parent::rules(), [
            'ma_sinh_vien' => 'required',
            'ten_sinh_vien' => 'required',
            'don_vi_dao_tao' => 'required',
            'khoa_bo_mon' => 'required',
            'sinh_vien_nam_thu' => 'required',
        ]);
    }

   public function messages()
   {
        return array_merge(parent::messages(), [
            'ma_sinh_vien.required' => 'ma_sinh_vien không được để trống.',
            'ten_sinh_vien.required' => 'ten_sinh_vien không được để trống.',
            'don_vi_dao_tao.required' => 'don_vi_dao_tao không được để trống.',
            'khoa_bo_mon.required' => 'khoa_bo_mon không được để trống.',
            'sinh_vien_nam_thu.required' => 'sinh_vien_nam_thu không được để trống.',
        ]);
   }

   public function filters()
   {
       return array_merge(parent::messages(), [
            
       ]);
   }
}
