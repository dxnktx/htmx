<?php

namespace Modules\TripBooking\src\Http\Requests\Post_type;

use Modules\TripBooking\src\Http\Requests\BaseFormRequest;

class UpdatePost_typeRequest extends BaseFormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return array_merge(parent::rules(), [
            'name' => 'required',
            'image' => 'required'
        ]);
    }

   public function messages()
   {
        return array_merge(parent::messages(), [
            'name.required' => 'name không được để trống.',
            'image.required' => 'image không được để trống.'
        ]);
   }

   public function filters()
   {
       return array_merge(parent::messages(), [
            
       ]);
   }
}
