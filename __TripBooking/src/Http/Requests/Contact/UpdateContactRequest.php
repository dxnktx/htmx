<?php

namespace Modules\TripBooking\src\Http\Requests\Contact;

use Modules\TripBooking\src\Http\Requests\BaseFormRequest;

class UpdateContactRequest extends BaseFormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return array_merge(parent::rules(), [
            'name' => 'required',
            'email' => 'required|email',
        ]);
    }

   public function messages()
   {
        return array_merge(parent::messages(), [
            'name.required' => 'name không được để trống.',
            'email.required' => 'email không được để trống.',
        ]);
   }

   public function filters()
   {
       return array_merge(parent::messages(), [
            
       ]);
   }
}
