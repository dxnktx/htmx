<?php

namespace Modules\TripBooking\src\Http\Requests\Station;

use Modules\TripBooking\src\Http\Requests\BaseFormRequest;

class UpdateStationRequest extends BaseFormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return array_merge(parent::rules(), [
            'tinh_thanh' => 'required'
        ]);
    }

   public function messages()
   {
        return array_merge(parent::messages(), [
            'tinh_thanh.required' => 'tinh_thanh không được để trống.'
        ]);
   }

   public function filters()
   {
       return array_merge(parent::messages(), [
            
       ]);
   }
}
