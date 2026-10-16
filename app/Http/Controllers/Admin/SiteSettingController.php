<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\SettingService;
use Illuminate\Http\UploadedFile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

/**
 * Admin ▸ Site Settings — dynamic site identity & branding.
 *
 * Reads the field definitions from config/site.php so new identity variables or
 * uploads can be added without touching this controller.
 */
class SiteSettingController extends Controller
{
    public function __construct(protected SettingService $settings)
    {
    }

    public function index()
    {
        return view('admin.site-setting.index', [
            'identity' => $this->fieldsFor('identity'),
            'branding' => $this->fieldsFor('branding'),
            'blocks'   => $this->fieldsFor('blocks'),
        ]);
    }

    public function update(Request $request)
    {
        $rules = [];

        foreach (['identity', 'blocks'] as $group) {
            foreach (config('site.' . $group, []) as $key => $def) {
                $rules[$group . '.' . $key] = ['nullable', 'string', 'max:6000'];
            }
        }

        foreach (config('site.branding', []) as $key => $def) {
            $rules['branding.' . $key] = [
                'nullable',
                'file',
                'mimes:' . implode(',', $def['extensions'] ?? ['png', 'svg', 'ico', 'webp', 'jpg', 'jpeg']),
                'max:' . ($def['max_kb'] ?? 2048),
            ];
        }

        $data = $request->validate($rules);

        // Plain text fields (identity, blocks).
        foreach (['identity', 'blocks'] as $group) {
            foreach ($data[$group] ?? [] as $key => $value) {
                if ($value === null) {
                    continue;
                }

                $this->settings->set($group . '.' . $key, $value);
            }
        }

        // File uploads (branding).
        foreach ($data['branding'] ?? [] as $key => $file) {
            if ($file instanceof UploadedFile) {
                $this->storeUpload('branding.' . $key, $file, 'branding');
            }
        }

        SettingService::flush();

        return back()->with('message', 'Site settings updated successfully.');
    }

    /**
     * Field definitions + current values for one settings namespace.
     */
    protected function fieldsFor(string $group): array
    {
        $fields = [];

        foreach (config('site.' . $group, []) as $key => $def) {
            $full = $group . '.' . $key;

            $fields[$full] = $def + [
                'input' => $group . '[' . $key . ']',
                'name'  => $full,
                'value' => $this->settings->get($full),
                'url'   => $this->settings->url($full),
            ];
        }

        return $fields;
    }

    /**
     * Store an uploaded image on the public disk and delete the previous one.
     */
    protected function storeUpload(string $settingKey, UploadedFile $file, string $dir): void
    {
        $old = $this->settings->raw($settingKey);

        $path = $file->store($dir, 'public');

        $this->settings->set($settingKey, $path);

        if ($old && $old !== $path && Storage::disk('public')->exists($old)) {
            Storage::disk('public')->delete($old);
        }
    }
}
