<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\SettingService;
use Illuminate\Http\UploadedFile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

/**
 * Admin ▸ Page Content — edit every public page writeup.
 *
 * The editable field list for each page comes from config/site_pages.php, so
 * adding a heading or paragraph to a page is a one-line config change.
 */
class PageContentController extends Controller
{
    public function __construct(protected SettingService $settings)
    {
    }

    public function index(Request $request)
    {
        $pages = config('site_pages', []);

        $slug = (string) $request->query('page', '');

        if ($slug === '' || ! isset($pages[$slug])) {
            $slug = (string) array_key_first($pages);
        }

        return view('admin.page-content.index', [
            'pages'  => $pages,
            'slug'   => $slug,
            'meta'   => $pages[$slug],
            'fields' => $this->fieldsFor($slug),
        ]);
    }

    public function update(Request $request, string $page)
    {
        $pages = config('site_pages', []);
        abort_unless(isset($pages[$page]), 404);

        $defs = $pages[$page]['fields'] ?? [];

        $rules = [];

        foreach ($defs as $key => $def) {
            if (($def['type'] ?? 'text') === 'image') {
                $extensions = implode(',', $def['extensions'] ?? ['png', 'jpg', 'jpeg', 'webp', 'svg', 'ico']);
                $maxKb = (int) ($def['max_kb'] ?? 4096);

                $rules['fields.' . $key] = ['nullable', 'file', 'mimes:' . $extensions, 'max:' . $maxKb];
            } else {
                $rules['fields.' . $key] = ['nullable', 'string', 'max:20000'];
            }
        }

        $data = $request->validate($rules);

        foreach ($data['fields'] ?? [] as $key => $value) {
            if (! isset($defs[$key])) {
                continue;
            }

            if (($defs[$key]['type'] ?? 'text') === 'image') {
                if ($value instanceof UploadedFile) {
                    $this->storeImage("page.$page.$key", $value);
                }

                continue;
            }

            if ($value === null) {
                continue;
            }

            $this->settings->set("page.$page.$key", $value);
        }

        SettingService::flush();

        return redirect()
            ->route('admin.pages', ['page' => $page])
            ->with('message', 'Page content updated successfully.');
    }

    /**
     * Field definitions + current values for one page.
     */
    protected function fieldsFor(string $slug): array
    {
        $fields = [];

        foreach (config("site_pages.$slug.fields", []) as $key => $def) {
            $full = "page.$slug.$key";

            $fields[$key] = $def + [
                'input' => 'fields[' . $key . ']',
                'name'  => 'fields.' . $key,
                'value' => $this->settings->get($full),
                'url'   => $this->settings->url($full),
            ];
        }

        return $fields;
    }

    /**
     * Store a page image on the public disk and delete the previous one.
     */
    protected function storeImage(string $settingKey, UploadedFile $file): void
    {
        $old = $this->settings->raw($settingKey);

        $path = $file->store('content', 'public');

        $this->settings->set($settingKey, $path);

        if ($old && $old !== $path && Storage::disk('public')->exists($old)) {
            Storage::disk('public')->delete($old);
        }
    }
}
