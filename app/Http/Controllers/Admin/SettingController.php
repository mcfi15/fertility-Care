<?php

namespace App\Http\Controllers\Admin;

use App\Models\Setting;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use App\Http\Requests\SettingsFormRequest;

class SettingController extends Controller
{
    protected function updateSettingFromRequest($setting, $request, $validatedData)
    {
        $fields = [
            'website_name', 'website_url', 'page_title',
            'meta_keywords', 'meta_description',
            'address', 'phone', 'phone2', 'email', 'email2',
            'facebook', 'twitter', 'instagram', 'linkedin',
            'clients', 'exp', 'emp', 'products',
            'longitude', 'latitude',
            'about_title', 'about_button_text', 'about_button_link',
            'feature1_title', 'feature1_description', 'feature1_icon',
            'feature2_title', 'feature2_description', 'feature2_icon',
            'feature3_title', 'feature3_description', 'feature3_icon',
            'faq_heading', 'faq_items', 'opening_hours',
            'google_analytics', 'header_scripts', 'footer_scripts',
        ];

        foreach ($fields as $field) {
            if (isset($validatedData[$field])) {
                $setting->$field = $validatedData[$field];
            }
        }

        $imageFields = [
            'logo' => 'uploads/logo/',
            'favicon' => 'uploads/favicon/',
            'footerlogo' => 'uploads/footerlogo/',
            'about_image' => 'uploads/about/',
        ];

        foreach ($imageFields as $field => $uploadPath) {
            if ($request->hasFile($field)) {
                if ($setting->$field) {
                    $oldPath = $uploadPath . basename($setting->$field);
                    if (File::exists($oldPath)) {
                        File::delete($oldPath);
                    }
                }
                $file = $request->file($field);
                $filename = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
                $file->move($uploadPath, $filename);
                $setting->$field = $uploadPath . $filename;
            }
        }

        return $setting;
    }

    public function index()
    {
        $setting = Setting::first();
        return view('admin.setting.index', compact('setting'));
    }

    public function store(SettingsFormRequest $request)
    {
        $validatedData = $request->validated();
        $setting = Setting::first();

        if ($setting) {
            $setting = $this->updateSettingFromRequest($setting, $request, $validatedData);
            $setting->update();
        } else {
            $setting = new Setting;
            $setting = $this->updateSettingFromRequest($setting, $request, $validatedData);
            $setting->save();
        }

        return redirect()->back()->with('message', 'Settings Saved Successfully');
    }
}