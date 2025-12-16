<?php

namespace Modules\TripBooking\src\Http\Requests\Category;

use Modules\TripBooking\src\Http\Requests\BaseFormRequest;

class UpdateCategoryRequest extends BaseFormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return array_merge(parent::rules(), [
            'name' => 'required',
            'slug' => 'required',
            'image' => 'required'
        ]);
    }

   public function messages()
   {
        return array_merge(parent::messages(), [
            'name.required' => 'name không được để trống.',
            'slug.required' => 'slug không được để trống.',
            'image.required' => 'image không được để trống.'
        ]);
   }

   public function filters()
   {
       return array_merge(parent::messages(), [
            
       ]);
   }
}
