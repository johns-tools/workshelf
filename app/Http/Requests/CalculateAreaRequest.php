<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class CalculateAreaRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'length_cm' => ['required', 'numeric', 'gt:0'],
            'width_cm' => ['required', 'numeric', 'gt:0'],
        ];
    }

    public function messages(): array
    {
        return [
            'length_cm.required' => 'Length in centimeters is required',
            'length_cm.numeric' => 'Length must be a number',
            'length_cm.gt' => 'Length must be greater than zero',
            'width_cm.required' => 'Width in centimeters is required',
            'width_cm.numeric' => 'Width must be a number',
            'width_cm.gt' => 'Width must be greater than zero',
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
