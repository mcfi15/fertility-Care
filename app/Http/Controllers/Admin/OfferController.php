<?php

namespace App\Http\Controllers\Admin;

use App\Models\Offer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use App\Http\Requests\OfferFormRequest;

class OfferController extends Controller
{
    public function index(){
        $offers = Offer::orderBy('id', 'DESC')->paginate('10');
        return view('admin.offer.index', compact('offers'));
    }

    public function create(){
        return view('admin.offer.create');
    }

    public function store(OfferFormRequest $request){
        $validatedData = $request->validated();

        $offer = new Offer;

        $offer->name = $validatedData['name'];
        $offer->description = $validatedData['description'];

        if($request->hasFile('image')){
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time().'.'.$ext;

            $file->move('uploads/offer/',$filename);
            $offer->image = "uploads/offer/$filename";
        }
        
        $offer->save();

        return redirect('admin/offers')->with('message', 'Offer uploaded successfully');

    }

    public function edit(Offer $offer){
        return view('admin.offer.edit', compact('offer'));
    }

    public function update(OfferFormRequest $request, $offer){
        $validatedData = $request->validated();

        $offer = Offer::findOrFail($offer);

        $offer->name = $validatedData['name'];
        $offer->description = $validatedData['description'];

        if($request->hasFile('image')){

            $path = 'uploads/offer/'.$offer->image;
            if(File::exists($path)){
                File::delete($path);
            }
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time().'.'.$ext;

            $file->move('uploads/offer/',$filename);
            $offer->image = "uploads/offer/$filename";
        }
        $offer->update();

        return redirect('admin/offers')->with('message', 'Offer updated successfully');

    }

    public function destroy(Offer $offer){
        if($offer->count() > 0){
            $destination = $offer->image;
            if(File::exists($destination)){
                File::delete($destination);
            }
            $offer->delete();
            return redirect('admin/offers')->with('message', 'Offer deleted successfully'); 
            
        }
        return redirect('admin/offers')->with('message', 'Something went wrong'); 
    }
}
