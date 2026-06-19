<?php

namespace App\Http\Controllers\Admin;

use App\Models\Faq;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FaqController extends Controller
{
    public function index()
    {
        $faqs = Faq::orderBy('position', 'ASC')->get();
        return view('admin.faq.index', compact('faqs'));
    }

    public function create()
    {
        return view('admin.faq.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'question' => 'required|string',
            'answer' => 'required|string',
            'position' => 'nullable|integer|min:0',
            'status' => 'nullable|boolean',
        ]);

        $faq = new Faq;
        $faq->question = $request->question;
        $faq->answer = $request->answer;
        $faq->position = $request->position ?? Faq::max('position') + 1;
        $faq->status = $request->has('status') ? true : false;
        $faq->save();

        return redirect('admin/faqs')->with('message', 'FAQ created successfully');
    }

    public function edit($faq_id)
    {
        $faq = Faq::findOrFail($faq_id);
        return view('admin.faq.edit', compact('faq'));
    }

    public function update(Request $request, $faq_id)
    {
        $request->validate([
            'question' => 'required|string',
            'answer' => 'required|string',
            'position' => 'nullable|integer|min:0',
        ]);

        $faq = Faq::findOrFail($faq_id);
        $faq->question = $request->question;
        $faq->answer = $request->answer;
        $faq->position = $request->position ?? $faq->position;
        $faq->status = $request->has('status') ? true : false;
        $faq->update();

        return redirect('admin/faqs')->with('message', 'FAQ updated successfully');
    }

    public function destroy($faq_id)
    {
        $faq = Faq::findOrFail($faq_id);
        $faq->delete();

        return redirect('admin/faqs')->with('message', 'FAQ deleted successfully');
    }
}