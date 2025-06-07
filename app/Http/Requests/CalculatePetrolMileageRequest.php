<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class CalculatePetrolMileageRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'tank_litres' => ['required', 'numeric', 'gt:0'],
            'cost_per_litre' => ['required', 'numeric', 'gt:0'],
            'range_miles' => ['required', 'numeric', 'gt:0'],
        ];
    }

    public function messages(): array
    {
        return [
            'tank_litres.required' => 'The tank capacity in litres is required',
            'tank_litres.numeric' => 'The tank capacity must be a number',
            'tank_litres.gt' => 'The tank capacity must be greater than zero',

            'cost_per_litre.required' => 'The cost per litre is required',
            'cost_per_litre.numeric' => 'The cost per litre must be a number',
            'cost_per_litre.gt' => 'The cost per litre must be greater than zero',

            'range_miles.required' => 'The range in miles is required',
            'range_miles.numeric' => 'The range must be a number',
            'range_miles.gt' => 'The range must be greater than zero',
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(
            response()->json([
                'success' => false,
                'message' => 'Validation errors',
                'error_message' => $validator->errors()->all()[0],
                'errors' => $validator->errors(),
            ], 422)
        );
    }
}
