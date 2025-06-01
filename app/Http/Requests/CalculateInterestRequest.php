<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class CalculateInterestRequest extends FormRequest
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
            'amount' => ['required', 'integer', 'min:1'],
            'months' => ['required', 'integer', 'min:1', 'max:360'], // max 30 years
            'interest' => ['required', 'numeric', 'min:0', 'max:100'], // percentage between 0 and 100
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
            'amount.required' => 'The loan amount is required',
            'amount.integer' => 'The loan amount must be a whole number',
            'amount.min' => 'The loan amount must be at least 1',
            'months.required' => 'The loan term in months is required',
            'months.integer' => 'The loan term must be a whole number',
            'months.min' => 'The loan term must be at least 1 month',
            'months.max' => 'The loan term cannot exceed 360 months (30 years)',
            'interest.required' => 'The interest rate is required',
            'interest.numeric' => 'The interest rate must be a number',
            'interest.min' => 'The interest rate cannot be negative',
            'interest.max' => 'The interest rate cannot exceed 100%'
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
                'errors' => $validator->errors()
            ], 422)
        );
    }
} 