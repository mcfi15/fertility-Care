<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Admin\Concerns\StoresUploads;
use App\Http\Controllers\Controller;
use App\Models\Testimonial;
use Illuminate\Http\Request;

/**
 * Admin ▸ Testimonials — the only place testimonials can be created or edited.
 * The Home page and the Testimonials page both read the same active rows.
 */
class TestimonialController extends Controller
{
    use StoresUploads;

    public function index()
    {
        return view('admin.testimonial.index', [
            'testimonials' => Testimonial::query()->ordered()->paginate(15),
        ]);
    }

    public function create()
    {
        return view('admin.testimonial.create', [
            'testimonial' => new Testimonial(['rating' => 5, 'is_active' => true]),
        ]);
    }

    public function store(Request $request)
    {
        $data = $this->validated($request);

        $data['is_active']  = $request->boolean('is_active');
        $data['rating']     = $data['rating'] ?? 5;
        $data['sort_order'] = $data['sort_order'] ?? ((int) Testimonial::query()->max('sort_order') + 1);

        if ($file = $request->file('image')) {
            $data['image'] = $this->storeImage(null, $file, 'testimonials');
        }

        Testimonial::query()->create($data);

        return redirect()->route('admin.testimonials.index')
            ->with('message', 'Testimonial created successfully.');
    }

    public function edit(Testimonial $testimonial)
    {
        return view('admin.testimonial.edit', compact('testimonial'));
    }

    public function update(Request $request, Testimonial $testimonial)
    {
        $data = $this->validated($request);

        $data['is_active']  = $request->boolean('is_active');
        $data['rating']     = $data['rating'] ?? 5;
        $data['sort_order'] = $data['sort_order'] ?? 0;

        if ($file = $request->file('image')) {
            $data['image'] = $this->storeImage($testimonial->image, $file, 'testimonials');
        }

        $testimonial->update($data);

        return redirect()->route('admin.testimonials.index')
            ->with('message', 'Testimonial updated successfully.');
    }

    public function destroy(Testimonial $testimonial)
    {
        if ($testimonial->image && ! str_starts_with($testimonial->image, '/')) {
            \Illuminate\Support\Facades\Storage::disk('public')->delete($testimonial->image);
        }

        $testimonial->delete();

        return redirect()->route('admin.testimonials.index')
            ->with('message', 'Testimonial deleted.');
    }

    /** Toggle the public visibility of a testimonial. */
    public function toggle(Testimonial $testimonial)
    {
        $testimonial->update(['is_active' => ! $testimonial->is_active]);

        return back()->with('message', 'Testimonial visibility updated.');
    }

    /** Move a testimonial one position up or down. */
    public function move(Request $request, Testimonial $testimonial)
    {
        $direction = $request->input('direction') === 'up' ? 'up' : 'down';

        $neighbour = Testimonial::query()
            ->where('sort_order', $direction === 'up' ? '<' : '>', $testimonial->sort_order)
            ->orderBy('sort_order', $direction === 'up' ? 'desc' : 'asc')
            ->first();

        if ($neighbour) {
            $swap = $testimonial->sort_order;
            $testimonial->update(['sort_order' => $neighbour->sort_order]);
            $neighbour->update(['sort_order' => $swap]);
        }

        return back()->with('message', 'Order updated.');
    }

    /** @return array<string, mixed> */
    protected function validated(Request $request): array
    {
        return $request->validate([
            'name'       => ['required', 'string', 'max:120'],
            'role'       => ['nullable', 'string', 'max:120'],
            'category'   => ['nullable', 'string', 'max:80'],
            'location'   => ['nullable', 'string', 'max:120'],
            'quote'      => ['required', 'string', 'max:2000'],
            'image'      => ['nullable', 'image', 'mimes:png,jpg,jpeg,webp,gif,svg', 'max:4096'],
            'rating'     => ['nullable', 'integer', 'min:1', 'max:5'],
            'sort_order' => ['nullable', 'integer', 'min:0'],
        ]);
    }
}
