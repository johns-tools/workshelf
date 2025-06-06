<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class CalculateEvMileageRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'battery_kwh' => ['required', 'numeric', 'gt:0'],
            'cost_per_kwh' => ['required', 'numeric', 'gt:0'],
            'range_miles' => ['required', 'numeric', 'gt:0'],
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
            'battery_kwh.required' => 'The battery capacity in kWh is required',
            'battery_kwh.numeric' => 'The battery capacity must be a number',
            'battery_kwh.gt' => 'The battery capacity must be greater than zero',
            
            'cost_per_kwh.required' => 'The cost per kWh is required',
            'cost_per_kwh.numeric' => 'The cost per kWh must be a number',
            'cost_per_kwh.gt' => 'The cost per kWh must be greater than zero',
            
            'range_miles.required' => 'The range in miles is required',
            'range_miles.numeric' => 'The range must be a number',
            'range_miles.gt' => 'The range must be greater than zero',
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