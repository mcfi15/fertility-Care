<?php

namespace App\Http\Controllers\Admin;

use App\Models\About;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;

class AboutController extends Controller
{
    public function index(){
        $about = About::where('id', 1)->orderBy('id', 'DESC')->first();
        return view('admin.about.index', compact('about'));
    }

    public function update(Request $request, int $about){
        $request->validate([
            'title' => 'required',
            'description' => 'required|string|max:500',
            'image' => ['nullable', 'mimes:jpg,png,jpeg,PNG,JPG,JPEG']
        ]);

        $about = About::findOrFail($about);

        $about->title = $request->title;
        $about->description = $request->description;

        if($request->hasFile('image')){

            $path = $about->image;
            if(File::exists($path)){
                File::delete($path);
            }
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time().'.'.$ext;

            $file->move('uploads/about/',$filename);
            $about->image = "uploads/about/$filename";
        }
        $about->update();

        return redirect('admin/about')->with('message', 'About updated successfully');

    }
}
