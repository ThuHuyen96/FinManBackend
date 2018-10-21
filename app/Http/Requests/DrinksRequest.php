<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DrinksRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'id',
            'name',
            'price',
            'status',
            'preparation',
            'quantity',
            'images'
        ];
    }
}