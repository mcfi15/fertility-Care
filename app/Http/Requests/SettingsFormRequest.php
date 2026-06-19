<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SettingsFormRequest extends FormRequest
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
            'website_name' => ['nullable', 'string'],
            'website_url' => ['nullable', 'string'],
            'page_title' => ['nullable', 'max:255', 'string'],
            'meta_keywords' => ['nullable', 'max:500', 'string'],
            'meta_description' => ['nullable', 'max:500', 'string'],
            'address' => ['nullable', 'string'],
            'phone' => ['nullable', 'string'],
            'phone2' => ['nullable', 'string'],
            'email' => ['nullable', 'email:filter', 'max:255', 'string'],
            'email2' => ['nullable', 'email:filter', 'max:255', 'string'],
            'logo' => ['nullable', 'mimes:jpg,png,jpeg,PNG,JPG,JPEG'],
            'footerlogo' => ['nullable', 'mimes:jpg,png,jpeg,PNG,JPG,JPEG'],
            'favicon' => ['nullable', 'mimes:jpg,png,jpeg,PNG,JPG,JPEG'],
            'facebook' => ['nullable', 'string'],
            'twitter' => ['nullable', 'string'],
            'instagram' => ['nullable', 'string'],
            'linkedin' => ['nullable', 'string'],
            'clients' => ['nullable', 'string'],
            'exp' => ['nullable', 'string'],
            'emp' => ['nullable', 'string'],
            'longitude' => ['nullable', 'string'],
            'latitude' => ['nullable', 'string'],
            'products' => ['nullable', 'string'],
            'about_title' => ['nullable', 'string'],
            'about_image' => ['nullable', 'mimes:jpg,png,jpeg,PNG,JPG,JPEG,webp'],
            'about_button_text' => ['nullable', 'string'],
            'about_button_link' => ['nullable', 'string'],
            'feature1_title' => ['nullable', 'string'],
            'feature1_description' => ['nullable', 'string'],
            'feature1_icon' => ['nullable', 'string'],
            'feature2_title' => ['nullable', 'string'],
            'feature2_description' => ['nullable', 'string'],
            'feature2_icon' => ['nullable', 'string'],
            'feature3_title' => ['nullable', 'string'],
            'feature3_description' => ['nullable', 'string'],
            'feature3_icon' => ['nullable', 'string'],
            'faq_heading' => ['nullable', 'string'],
            'faq_items' => ['nullable', 'string'],
            'opening_hours' => ['nullable', 'string'],
            'google_analytics' => ['nullable', 'string'],
            'header_scripts' => ['nullable', 'string'],
            'footer_scripts' => ['nullable', 'string']
        ];
    }
}
