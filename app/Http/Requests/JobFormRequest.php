<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class JobFormRequest extends FormRequest
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
            'title' => ['required', 'string'],
            'small_description' => ['required', 'string'],
            'description' => ['nullable', 'string'],
            'closing_date' => ['nullable', 'string'],
            'status' => ['nullable', 'string'],
            'slug' => ['required', 'string'],
            'position' => ['nullable', 'string'],
            'location' => ['nullable', 'string'],
            'eligibility' => ['nullable', 'string'],
            'type' => ['nullable','string']
        ];
    }
}
