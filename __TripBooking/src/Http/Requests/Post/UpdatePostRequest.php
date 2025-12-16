<?php

namespace Modules\TripBooking\src\Http\Requests\Post;

use Modules\TripBooking\src\Http\Requests\BaseFormRequest;

class UpdatePostRequest extends BaseFormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return array_merge(parent::rules(), [
            'heading' => 'required',
        ]);
    }

   public function messages()
   {
        return array_merge(parent::messages(), [
            'heading.required' => 'heading không được để trống.',
        ]);
   }

   public function filters()
   {
       return array_merge(parent::messages(), [
            
       ]);
   }
}
