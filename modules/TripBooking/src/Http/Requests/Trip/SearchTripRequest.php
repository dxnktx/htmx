<?php

namespace Modules\TripBooking\src\Http\Requests\Trip;

use Modules\TripBooking\src\Http\Requests\BaseFormRequest;

class SearchTripRequest extends BaseFormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return array_merge(parent::rules(), []);
    }

    public function messages()
    {
        return array_merge(parent::messages(), []);
    }

    public function filters()
    {
        return array_merge(parent::messages(), []);
    }
}
