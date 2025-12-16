<?php

namespace Modules\TripBooking\src\Http\Requests\Department;

use Modules\TripBooking\src\Http\Requests\BaseFormRequest;

class UpdateDepartmentRequest extends BaseFormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return array_merge(parent::rules(), [
            'ma_khoa' => 'required',
            'ten_khoa' => 'required'
        ]);
    }

   public function messages()
   {
        return array_merge(parent::messages(), [
            'ma_khoa.required' => 'ma_khoa không được để trống.',
            'ten_khoa.required' => 'ten_khoa không được để trống.'
        ]);
   }

   public function filters()
   {
       return array_merge(parent::messages(), [
            
       ]);
   }
}
