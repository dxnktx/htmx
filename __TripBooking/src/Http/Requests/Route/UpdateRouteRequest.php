<?php

namespace Modules\TripBooking\src\Http\Requests\Route;

use Modules\TripBooking\src\Http\Requests\BaseFormRequest;

class UpdateRouteRequest extends BaseFormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return array_merge(parent::rules(), [
            'ma_tuyen_duong' => 'required',
            'ten_tuyen_duong' => 'required',
            'khu_vuc' => 'required',
        ]);
    }

   public function messages()
   {
        return array_merge(parent::messages(), [
            'ma_tuyen_duong.required' => 'ma_tuyen_duong không được để trống.',
            'ten_tuyen_duong.required' => 'ten_tuyen_duong không được để trống.',
            'khu_vuc.required' => 'khu_vuc không được để trống.',
        ]);
   }

   public function filters()
   {
       return array_merge(parent::messages(), [
            
       ]);
   }
}
