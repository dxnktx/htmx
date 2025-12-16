<?php

namespace Modules\TripBooking\src\Http\Requests\Bank;

use Modules\TripBooking\src\Http\Requests\BaseFormRequest;

class UpdateBankRequest extends BaseFormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return array_merge(parent::rules(), [
            'ma_ngan_hang' => 'required',
            'ten_ngan_hang' => 'required',
        ]);
    }

   public function messages()
   {
        return array_merge(parent::messages(), [
            'ma_ngan_hang.required' => 'ma_ngan_hang không được để trống.',
            'ten_ngan_hang.required' => 'ten_ngan_hang không được để trống.',
        ]);
   }

   public function filters()
   {
       return array_merge(parent::messages(), [
            
       ]);
   }
}
