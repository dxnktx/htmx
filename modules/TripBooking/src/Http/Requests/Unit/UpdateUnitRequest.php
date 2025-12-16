<?php

namespace Modules\TripBooking\src\Http\Requests\Unit;

use Modules\TripBooking\src\Http\Requests\BaseFormRequest;

class UpdateUnitRequest extends BaseFormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return array_merge(parent::rules(), [
            'ten_don_vi' => 'required'
        ]);
    }

   public function messages()
   {
        return array_merge(parent::messages(), [
            'ten_don_vi.required' => 'ten_don_vi không được để trống.'
        ]);
   }

   public function filters()
   {
       return array_merge(parent::messages(), [
            
       ]);
   }
}
