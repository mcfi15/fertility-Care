<?php

namespace App\Http\Controllers\Admin;

use App\Models\Images;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use App\Http\Requests\ProductFormRequest;

class ProductsController extends Controller
{
    public function index(){
        $products = Product::orderBy('id', 'DESC')->paginate('10');
        return view('admin.products.index', compact('products'));
    }

    public function create(){
        $categories = Category::all();
        return view('admin.products.create', compact('categories'));
    }

    public function store(ProductFormRequest $request){
        $validatedData = $request->validated();

        $category = Category::findOrFail($validatedData['category_id']);

        if($request->hasFile('image')){
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time().'.'.$ext;

            $file->move('uploads/image/',$filename);
            $validatedData['image'] = "uploads/image/$filename";
        }

        // $validatedData['product_code'] = 'PT-'.rand(100000,999999);
        $validatedData['status'] = $request->status == true ? '1' : '0';

        $product = $category->products()->create([
            'category_id' => $validatedData['category_id'],
            'title' => $validatedData['title'],
            'product_code' => 'PT-'.time(),
            'small_description' => $validatedData['small_description'],
            'price' => $validatedData['price'],
            'status' => $validatedData['status'],
            'slug' => Str::slug($validatedData['title']),
            'meta_title' => $validatedData['meta_title'],
            'meta_description' => $validatedData['meta_description'],
            'meta_keywords' => $validatedData['meta_keywords'],
            'image' => $validatedData['image']
        ]);

        if($request->hasFile('images')){
            $uploadPath = 'uploads/images/';

            $i = 1;
            foreach($request->file('images') as $images){
                $extension = $images->getClientOriginalExtension();
                $filename = time().$i++.'.'.$extension;
                $images->move($uploadPath,$filename);
                $fileImagesPathName = $uploadPath.$filename;

                $product->images()->create([
                    'product_id' => $product->id,
                    'images' => $fileImagesPathName,
                ]);
            }
        }

        return redirect('admin/products')->with('message', 'Products Successfully uploaded');
        
    }

    public function edit(int $product_id){
        $categories = Category::all();
        $product = Product::findOrFail($product_id);
        return view('admin.products.edit', compact('product', 'categories'));
    }

    public function update(ProductFormRequest $request, int $product_id){
        $validatedData = $request->validated();

        $product = Category::findOrFail($validatedData['category_id'])
                        ->products()->where('id', $product_id)->first();
        if($product){
            
            if($request->hasFile('image')){
                $path = $product->image;
                if(File::exists($path)){
                    File::delete($path);
                }

                $file = $request->file('image');
                $ext = $file->getClientOriginalExtension();
                $filename = time().'.'.$ext;
    
                $file->move('uploads/image/',$filename);
                $product->image = 'uploads/image/'.$filename;
            }
    
            $validatedData['status'] = $request->status == true ? '1' : '0';

            $product->category_id = $validatedData['category_id'];
            $product->title = $validatedData['title'];
            $product->small_description = $validatedData['small_description'];
            $product->description = $validatedData['description'];
            $product->price = $validatedData['price'];
            $product->status = $validatedData['status'];
            // $product->slug = Str::slug($validatedData['slug']);
            $product->meta_title = $validatedData['meta_title'];
            $product->meta_description = $validatedData['meta_description'];
            $product->meta_keywords = $validatedData['meta_keywords'];
            
            $product->update();


            if($request->hasFile('images')){
                $uploadPath = 'uploads/images/';
    
                $i = 1;
                foreach($request->file('images') as $images){
                    $extension = $images->getClientOriginalExtension();
                    $filename = time().$i++.'.'.$extension;
                    $images->move($uploadPath,$filename);
                    $fileImagesPathName = $uploadPath.$filename;
    
                    $product->images()->create([
                        'product_id' => $product->id,
                        'images' => $fileImagesPathName,
                    ]);
                }
            }

            return redirect('admin/products')->with('message', 'Product Updated Successfully');
        }else{
            return redirect('admin/products')->with('message', 'No Such Product ID Found');
        }
    }

    public function destroyImage(int $parcel_image_id){
        $image = Images::findOrFail($parcel_image_id);
        $path = $image->images;
        if(File::exists($path)){
            File::delete($path);
        }
        $image->delete();
        return redirect()->back()->with('message', 'Product Image Deleted Successfully');
    }

    public function destroy(int $product_id){
        $product = Product::findOrFail($product_id);
        $destination = $product->image;
        if(File::exists($destination)){
            File::delete($destination);
        }
        if($product->images){
            foreach ($product->images as $image) {
                $path = $image->images;
                if(File::exists($path)){
                    File::delete($path);
                }
            }
        }
        $product->delete();
        return redirect()->back()->with('message', 'Product Deleted Successfully');
    }


    public function searchProducts(Request $request){
        if($request->search){

            $searchProducts = Product::where('title','LIKE', '%'.$request->search.'%')->orWhere('product_code','LIKE', '%'.$request->search.'%')->latest()->paginate(10);
            return view('admin.products.search', compact('searchProducts'));
        }else{
            return redirect()->back()->with('error', 'empty search');
        }
    }
}
