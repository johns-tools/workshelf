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
            'range_miles' => ['required_without:mpg', 'nullable', 'numeric', 'gt:0'],
            'mpg' => ['required_without:range_miles', 'nullable', 'numeric', 'gt:0'],
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

            'range_miles.required_without' => 'The range in miles is required when mpg is not provided',
            'range_miles.numeric' => 'The range must be a number',
            'range_miles.gt' => 'The range must be greater than zero',

            'mpg.required_without' => 'The miles per gallon is required when range is not provided',
            'mpg.numeric' => 'Miles per gallon must be a number',
            'mpg.gt' => 'Miles per gallon must be greater than zero',
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
