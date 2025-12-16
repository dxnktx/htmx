<?php

namespace Modules\TripBooking\src\Http\Requests\Activity;

use Modules\TripBooking\src\Http\Requests\BaseFormRequest;

class UpdateActivityRequest extends BaseFormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return array_merge(parent::rules(), [
            'heading' => 'required',
            'slug' => 'required',
            'short_description' => 'required',
            'description' => 'required',
            'total_view' => 'required',
            'photo' => 'required'
        ]);
    }

   public function messages()
   {
        return array_merge(parent::messages(), [
            'heading.required' => 'heading không được để trống.',
            'slug.required' => 'slug không được để trống.',
            'short_description.required' => 'short_description không được để trống.',
            'description.required' => 'description không được để trống.',
            'total_view.required' => 'total_view không được để trống.',
            'photo.required' => 'photo không được để trống.'
        ]);
   }

   public function filters()
   {
       return array_merge(parent::messages(), [
            
       ]);
   }
}
