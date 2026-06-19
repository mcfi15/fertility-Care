<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ApplicationFormRequest extends FormRequest
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
            'job_title' => ['required', 'string'],
            'firstname' => ['required', 'string'],
            'middlename' => ['nullable', 'string'],
            'lastname' => ['required', 'string'],
            'position' => ['required', 'string'],
            'email' => ['required', 'string'],
            'phone' => ['nullable', 'string'],
            'coverletter' => ['required', 'string'],
            'cv' => ['nullable', 'mimes:pdf'],
            'other' => ['nullable', 'mimes:pdf']
            
        ];
    }
}
