<?php

namespace Modules\TripBooking\src\Http\Requests\Gallery;

use Modules\TripBooking\src\Http\Requests\BaseFormRequest;

class UpdateGalleryRequest extends BaseFormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return array_merge(parent::rules(), [
            'album' => 'required',
            'image' => 'required',
        ]);
    }

   public function messages()
   {
        return array_merge(parent::messages(), [
            'album.required' => 'album không được để trống.',
            'image.required' => 'image không được để trống.',
        ]);
   }

   public function filters()
   {
       return array_merge(parent::messages(), [
            
       ]);
   }
}
