<?php

namespace App\Http\Requests;

use App\Traits\FailedValidation;
use Illuminate\Foundation\Http\FormRequest;

class CredentialsRequest extends FormRequest
{
    
    /**
     * Determine if the user is authorized to make this request.
     */

     use FailedValidation;
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
            "user" => "required|string|max:300",
            "password" => "required|string|max:300",
            "description" => "sometimes",
            "sub_category_id" => "required|exists:sub_categories,id",
            'additional_information.*.title' => 'required|string|max:255', // El campo 'title' es requerido y debe ser una cadena
            'additional_information.*.values' => 'required|string|max:255', // El campo 'value' es requerido y debe ser una cadena
        ];
    }
}
