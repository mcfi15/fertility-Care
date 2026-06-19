<?php

namespace App\Http\Controllers\Admin;

use App\Models\Testimonial;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;

class TestimonialController extends Controller
{
    public function index(){
        $testimonials = Testimonial::orderBy('id', 'DESC')->paginate('10');
        return view('admin.testimonial.index', compact('testimonials'));
    }

    public function create(){
        return view('admin.testimonial.create');
    }

    public function store(Request $request){
        $request->validate([
            'name' => 'required',
            'position' => 'required',
            'description' => 'nullable',
            'image' => ['nullable', 'mimes:jpg,png,jpeg,PNG,JPG,JPEG']
        ]);

        $testimonial = new Testimonial;

        $testimonial->name = $request->name;
        $testimonial->position = $request->position;
        $testimonial->description = $request->description;


        if($request->hasFile('image')){
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time().'.'.$ext;

            $file->move('uploads/testimonial/',$filename);
            $testimonial->image = "uploads/testimonial/$filename";
        }
        
        $testimonial->save();

        return redirect('admin/testimonials')->with('message', 'Testimonial uploaded successfully');

    }

    public function edit(int $testimonial){
        $testimonial = Testimonial::findOrFail($testimonial);
        return view('admin.testimonial.edit', compact('testimonial'));
    }

    public function update(Request $request, int $testimonial){
        $request->validate([
            'name' => 'required',
            'position' => 'required',
            'description' => 'required',
            'image' => ['nullable', 'mimes:jpg,png,jpeg,PNG,JPG,JPEG']
        ]);

        $testimonial = Testimonial::findOrFail($testimonial);

        $testimonial->name = $request->name;
        $testimonial->position = $request->position;
        $testimonial->description = $request->description;

        if($request->hasFile('image')){

            $path = $testimonial->image;
            if(File::exists($path)){
                File::delete($path);
            }
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time().'.'.$ext;

            $file->move('uploads/testimonial/',$filename);
            $testimonial->image = "uploads/testimonial/$filename";
        }
        $testimonial->update();

        return redirect('admin/testimonials')->with('message', 'Testimonial updated successfully');

    }

    public function destroy(Testimonial $testimonial){
        if($testimonial->count() > 0){
            $destination = $testimonial->image;
            if(File::exists($destination)){
                File::delete($destination);
            }
            $testimonial->delete();
            return redirect('admin/testimonials')->with('message', 'Date deleted successfully'); 
            
        }
        return redirect('admin/testimonials')->with('message', 'Something went wrong'); 
    }
}
