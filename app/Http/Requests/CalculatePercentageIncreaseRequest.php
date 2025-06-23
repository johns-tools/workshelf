<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class CalculatePercentageIncreaseRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'principal' => ['required', 'numeric', 'gt:0'],
            'rate' => ['required', 'numeric', 'min:0', 'max:100'],
            'months' => ['required', 'integer', 'gt:0'],
            'monthly_addition' => ['nullable', 'numeric', 'min:0'],
        ];
    }

    /**
     * Get custom messages for validator errors.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'principal.required' => 'The principal amount is required',
            'principal.numeric' => 'The principal amount must be a number',
            'principal.gt' => 'The principal amount must be greater than zero',

            'rate.required' => 'The rate percentage is required',
            'rate.numeric' => 'The rate must be a number',
            'rate.min' => 'The rate cannot be negative',
            'rate.max' => 'The rate cannot exceed 100%',

            'months.required' => 'The number of months is required',
            'months.integer' => 'The number of months must be a whole number',
            'months.gt' => 'The number of months must be greater than zero',

            'monthly_addition.numeric' => 'The monthly addition must be a number',
            'monthly_addition.min' => 'The monthly addition cannot be negative',
        ];
    }

    /**
     * Handle a failed validation attempt.
     *
     * @param  \Illuminate\Contracts\Validation\Validator  $validator
     * @return void
     *
     * @throws \Illuminate\Http\Exceptions\HttpResponseException
     */
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
