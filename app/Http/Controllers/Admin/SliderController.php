<?php

namespace App\Http\Controllers\Admin;

use App\Models\Slider;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use App\Http\Requests\SliderFormRequest;

class SliderController extends Controller
{
    public function index(){
        $sliders = Slider::orderBy('id', 'DESC')->paginate('10');
        return view('admin.slider.index', compact('sliders')); 
    }

    public function create(){
        return view('admin.slider.create');
    }

    public function store(SliderFormRequest $request){
        $validatedData = $request->validated();

        if($request->hasFile('image')){
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time().'.'.$ext;

            $file->move('uploads/slider/',$filename);
            $validatedData['image'] = "uploads/slider/$filename";
        }

        $validatedData['status'] = $request->status == true ? '1' : '0';

        Slider::create([
            'title' => $validatedData['title'],
            'description' => $validatedData['description'],
            'image' => $validatedData['image'],
            'status' => $validatedData['status']
        ]);

        return redirect('admin/sliders')->with('message', 'Slider uploaded successfully');

    }

    public function edit(Slider $slider){
        return view('admin.slider.edit', compact('slider'));
    }

    public function update(SliderFormRequest $request, $slider){
        $validatedData = $request->validated();

        $slider = Slider::findOrFail($slider);

        $validatedData['status'] = $request->status == true ? '1' : '0';

        $slider->title = $validatedData['title'];
        $slider->description = $validatedData['description'];
        $slider->status = $validatedData['status'];
        

        if($request->hasFile('image')){

            $path = 'uploads/slider/'.$slider->image;
            if(File::exists($path)){
                File::delete($path);
            }
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time().'.'.$ext;

            $file->move('uploads/slider/',$filename);
            $slider->image = "uploads/slider/$filename";
        }
        $slider->update();

        return redirect('admin/sliders')->with('message', 'Slider updated successfully');

    }

    public function destroy(Slider $slider){
        if($slider->count() > 0){
            $destination = $slider->image;
            if(File::exists($destination)){
                File::delete($destination);
            }
            $slider->delete();
            return redirect('admin/sliders')->with('message', 'Slider deleted successfully'); 
            
        }
        return redirect('admin/sliders')->with('message', 'Something went wrong'); 
    }
}
