<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Center;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

/**
 * Admin ▸ Centers Directory — the only place Centers / Practitioners (type
 * "center") and NaPro consultant doctors (type "doctor") can be managed.
 * The Directory and NaPro-doctors pages both read from this table.
 */
class CenterController extends Controller
{
    public function index(Request $request)
    {
        $type = in_array($request->query('type'), array_keys(Center::types()), true)
            ? $request->query('type')
            : Center::TYPE_CENTER;

        return view('admin.center.index', [
            'centers' => Center::query()->where('type', $type)->ordered()->paginate(20),
            'type'    => $type,
            'types'   => Center::types(),
        ]);
    }

    public function create(Request $request)
    {
        $type = in_array($request->query('type'), array_keys(Center::types()), true)
            ? $request->query('type')
            : Center::TYPE_CENTER;

        return view('admin.center.create', [
            'center' => new Center(['type' => $type, 'is_active' => true]),
            'types'  => Center::types(),
        ]);
    }

    public function store(Request $request)
    {
        $data = $this->validated($request);

        $data['is_active']  = $request->boolean('is_active');
        $data['sort_order'] = $data['sort_order'] ?? ((int) Center::query()->max('sort_order') + 1);

        Center::query()->create($data);

        return redirect()->route('admin.centers.index', ['type' => $data['type']])
            ->with('message', 'Directory entry created successfully.');
    }

    public function edit(Center $center)
    {
        return view('admin.center.edit', [
            'center' => $center,
            'types'  => Center::types(),
        ]);
    }

    public function update(Request $request, Center $center)
    {
        $data = $this->validated($request);

        $data['is_active']  = $request->boolean('is_active');
        $data['sort_order'] = $data['sort_order'] ?? 0;

        $center->update($data);

        return redirect()->route('admin.centers.index', ['type' => $data['type']])
            ->with('message', 'Directory entry updated successfully.');
    }

    public function destroy(Center $center)
    {
        $type = $center->type;
        $center->delete();

        return redirect()->route('admin.centers.index', ['type' => $type])
            ->with('message', 'Directory entry deleted.');
    }

    public function toggle(Center $center)
    {
        $center->update(['is_active' => ! $center->is_active]);

        return back()->with('message', 'Visibility updated.');
    }

    /** @return array<string, mixed> */
    protected function validated(Request $request): array
    {
        return $request->validate([
            'type'       => ['required', Rule::in(array_keys(Center::types()))],
            'name'       => ['required', 'string', 'max:180'],
            'country'    => ['required', 'string', 'max:120'],
            'state'      => ['nullable', 'string', 'max:120'],
            'city'       => ['nullable', 'string', 'max:120'],
            'address'    => ['nullable', 'string', 'max:255'],
            'phone'      => ['nullable', 'string', 'max:60'],
            'email'      => ['nullable', 'email', 'max:150'],
            'hours'      => ['nullable', 'string', 'max:255'],
            'specialty'  => ['nullable', 'string', 'max:180'],
            'sort_order' => ['nullable', 'integer', 'min:0'],
        ]);
    }
}
