<?php

namespace Modules\TripBooking\src\Http\Requests\Banner;

use Modules\TripBooking\src\Http\Requests\BaseFormRequest;

class UpdateBannerRequest extends BaseFormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return array_merge(parent::rules(), [
            'name' => 'required',
            'image' => 'required',
            'link' => 'required',
            'type' => 'required'
        ]);
    }

   public function messages()
   {
        return array_merge(parent::messages(), [
            'name.required' => 'name không được để trống.',
            'image.required' => 'image không được để trống.',
            'link.required' => 'link không được để trống.',
            'type.required' => 'type không được để trống.'
        ]);
   }

   public function filters()
   {
       return array_merge(parent::messages(), [
            
       ]);
   }
}
