<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ApartmentsListRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'price.*' => 'int|nullable|min:100000|max:1000000',
            'bedrooms' => 'int|nullable|min:1|max:5',
            'bathrooms' => 'int|nullable|min:1|max:5',
            'storeys' => 'int|nullable|min:1|max:5',
            'garages' => 'int|nullable|min:1|max:5',
        ];
    }
}
