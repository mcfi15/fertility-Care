<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Faq;
use Illuminate\Http\Request;

/**
 * Admin ▸ FAQs — the only place FAQs can be created, edited or reordered.
 * The FAQ page (grouped by category) and every inline FAQ section read here.
 */
class FaqController extends Controller
{
    public function index()
    {
        $faqs = Faq::query()->ordered()->get();

        return view('admin.faq.index', [
            // Grouped for a tidy admin list, preserving the manual sort order.
            'groups' => $faqs->groupBy('category'),
            'total'  => $faqs->count(),
        ]);
    }

    public function create()
    {
        return view('admin.faq.create', [
            'faq'        => new Faq(['is_active' => true]),
            // Existing categories so the admin can reuse one instead of retyping.
            'categories' => Faq::query()->whereNotNull('category')->distinct()->orderBy('category')->pluck('category'),
        ]);
    }

    public function store(Request $request)
    {
        $data = $this->validated($request);

        $data['is_active']  = $request->boolean('is_active');
        $data['sort_order'] = $data['sort_order'] ?? ((int) Faq::query()->max('sort_order') + 1);

        Faq::query()->create($data);

        return redirect()->route('admin.faqs.index')
            ->with('message', 'FAQ created successfully.');
    }

    public function edit(Faq $faq)
    {
        return view('admin.faq.edit', [
            'faq'        => $faq,
            'categories' => Faq::query()->whereNotNull('category')->distinct()->orderBy('category')->pluck('category'),
        ]);
    }

    public function update(Request $request, Faq $faq)
    {
        $data = $this->validated($request);

        $data['is_active']  = $request->boolean('is_active');
        $data['sort_order'] = $data['sort_order'] ?? 0;

        $faq->update($data);

        return redirect()->route('admin.faqs.index')
            ->with('message', 'FAQ updated successfully.');
    }

    public function destroy(Faq $faq)
    {
        $faq->delete();

        return redirect()->route('admin.faqs.index')
            ->with('message', 'FAQ deleted.');
    }

    public function toggle(Faq $faq)
    {
        $faq->update(['is_active' => ! $faq->is_active]);

        return back()->with('message', 'FAQ visibility updated.');
    }

    public function move(Request $request, Faq $faq)
    {
        $direction = $request->input('direction') === 'up' ? 'up' : 'down';

        $neighbour = Faq::query()
            ->where('sort_order', $direction === 'up' ? '<' : '>', $faq->sort_order)
            ->orderBy('sort_order', $direction === 'up' ? 'desc' : 'asc')
            ->first();

        if ($neighbour) {
            $swap = $faq->sort_order;
            $faq->update(['sort_order' => $neighbour->sort_order]);
            $neighbour->update(['sort_order' => $swap]);
        }

        return back()->with('message', 'Order updated.');
    }

    /** @return array<string, mixed> */
    protected function validated(Request $request): array
    {
        return $request->validate([
            'category'   => ['nullable', 'string', 'max:120'],
            'question'   => ['required', 'string', 'max:500'],
            'answer'     => ['required', 'string', 'max:20000'],
            'sort_order' => ['nullable', 'integer', 'min:0'],
        ]);
    }
}
