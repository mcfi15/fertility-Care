@extends('layouts.admin')

@section('title', 'Update Product')

@section('content')

<div class="container">
    <div class="page-inner">
      <div class="page-header">
        <h3 class="fw-bold mb-3">Update Product</h3>
        <ul class="breadcrumbs mb-3">
          <li class="nav-home">
            <a href="/admin/dashboard">
              <i class="icon-home"></i>
            </a>
          </li>
          <li class="separator">
            <i class="icon-arrow-right"></i>
          </li>
          <li class="nav-item">
            <a href="{{ url('admin/Products') }}">Products</a>
          </li>
          <li class="separator">
            <i class="icon-arrow-right"></i>
          </li>
          <li class="nav-item">
            <a href="#">Update Product</a>
          </li>
        </ul>
      </div>
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header">
                <div class="d-flex align-items-center">
                <h4 class="card-title">Update Product</h4>
                <a href="{{ url('admin/products') }}" class="btn btn-primary btn-round ms-auto">
                    <i class="fa fa-arrow-left"></i>
                    Back
                </a>
                </div>
            </div>
            <form action="{{ url('admin/products/'.$product->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

            <div class="card-body">
              <div class="row">
                @include('layouts.alert.msg')
                
                <div class="col-md-6 col-lg-6">
                  <div class="form-group">
                      <label for="title">Name</label>
                      <input type="text" class="form-control" name="title" id="title" value="{{ $product->title }}"  placeholder="Name" />
                      @error('title')
                              <small class="text-danger">{{ $message }}</small>  
                          @enderror
                    </div>
              </div>
                
                <div class="col-md-6 col-lg-6">
                    <div class="form-group">
                        <label for="product_code">Product Unique ID</label>
                        <input type="text" class="form-control" name="product_code" id="product_code" value="{{ $product->product_code }}"  readonly/>
                        @error('product_code')
                                <small class="text-danger">{{ $message }}</small>  
                            @enderror
                      </div>
                </div>

                <div class="col-md-6 col-lg-6">
                  <div class="form-group">
                      <label for="slug">Slug</label>
                      <input type="text" class="form-control" name="slug" id="slug" value="{{ $product->slug }}"  placeholder="slug" readonly/>
                      @error('slug')
                              <small class="text-danger">{{ $message }}</small>  
                          @enderror
                    </div>
              </div>

                <div class="col-md-6 col-lg-6">
                  <div class="form-group">
                      <label for="price">Price</label>
                      <input type="text" class="form-control" name="price" id="price" value="{{ $product->price }}" placeholder="price" />
                      @error('price')
                              <small class="text-danger">{{ $message }}</small>  
                          @enderror
                    </div>
                </div>

                <div class="col-md-12 col-lg-12">
                  <div class="form-group">
                      
                      <label for="image">Featured Image</label>
                      <input type="file" class="form-control" name="image" id="image"  />
                      @error('image')
                              <small class="text-danger">{{ $message }}</small>  
                          @enderror
                          <br>
                          <img src="{{ url("$product->image") }}" alt="Feature Image" width="80" height="80">
                    </div>
                </div>

                <hr>

                <div class="col-md-6 col-lg-6">
                  <div class="form-group">
                    <label for="small_description">Small Description </label>
                    <textarea name="small_description" class="form-control" id="small_description" placeholder="Enter Description">{{ $product->small_description }}</textarea>
                    @error('small_description')
                              <small class="text-danger">{{ $message }}</small>  
                          @enderror
                  </div>
                </div>

                <div class="col-md-6 col-lg-6">
                  <div class="form-group">
                      <label for="status">Status</label> <br>
                      <input type="checkbox" name="status" id="status" {{ $product->status == '1' ? 'checked' : ''}} /> <br>
                      Checked = Hidden, Unchecked = Visible
                      @error('status')
                            <small class="text-danger">{{ $message }}</small>  
                        @enderror
                    </div>
                </div>

                <div class="col-md-6 col-lg-6">
                  <div class="form-group">
                    <label for="category">Category</label>
                      <select name="category_id" class="form-control" id="category">
                        @foreach($categories as $category)
                          <option value="{{ $category->id }}" {{ $category->id == $product->category_id ? 'selected':'' }}>{{ $category->name }}</option>
                        @endforeach
                      </select>
                      @error('category_id')
                              <small class="text-danger">{{ $message }}</small>  
                          @enderror
                    
                    
                  </div>
                </div>

                <div class="col-md-6 col-lg-6">
                  <div class="form-group">
                    <label for="description">Description </label>
                    <textarea name="description" class="form-control" id="description" placeholder="Enter Description">{{ $product->description }}</textarea>
                    @error('description')
                              <small class="text-danger">{{ $message }}</small>  
                          @enderror
                  </div>
                </div>

                <hr>

                <div class="col-md-6 col-lg-6">
                  <div class="form-group">
                    <label for="images">Multiple Images <span style="color:red;"><small>(optional)</small></span></label>
                    <input type="file" class="form-control" name="images[]" id="images" multiple />
                    @error('images')
                        <small class="text-danger">{{ $message }}</small>  
                    @enderror
                    <br>
                    <div>
                      @if ($product->images)
                      <div class="row">
                        @forelse ($product->images as $image)
                          <div class="col-md-2">
                            <img src="{{ asset("$image->images") }}" alt="Images" style="width:80px; height:80px;" class="me-4 border">
                            <a href="{{ url('admin/product-image/'.$image->id.'/delete') }}" class="d-black"><i class="fas fa-trash"></i></a>
                          </div>
                        @empty   
                          <span style="color: red;">No Image Added</span>
                        @endforelse
                      </div>
                      @endif
                      
                    </div>
                  </div>
                </div>

                <div class="col-md-6 col-lg-6">
                  <div class="form-group">
                      <label for="meta_title">Meta Title <span style="color:red;"><small>(optional)</small></span></label>
                      <input type="text" class="form-control" name="meta_title" id="meta_title" value="{{ $product->meta_title }}"  placeholder="meta title" />
                      @error('meta_title')
                              <small class="text-danger">{{ $message }}</small>  
                          @enderror
                    </div>
                </div>

                <div class="col-md-6 col-lg-6">
                  <div class="form-group">
                    <label for="meta_description">Meta Description <span style="color:red;"><small>(optional)</small></span></label>
                    <textarea name="meta_description" class="form-control" id="meta_description" placeholder="Meta Description">{{ $product->meta_description }}</textarea>
                    @error('meta_description')
                              <small class="text-danger">{{ $message }}</small>  
                          @enderror
                  </div>
                </div>

                <div class="col-md-6 col-lg-6">
                  <div class="form-group">
                    <label for="meta_keywords">Meta Keywords <span style="color:red;"><small>(optional)</small></span></label>
                    <textarea name="meta_keywords" class="form-control" id="meta_keywords" placeholder="Meta Keywords">{{ $product->meta_keywords }}</textarea>
                    @error('meta_keywords')
                              <small class="text-danger">{{ $message }}</small>  
                          @enderror
                  </div>
                </div>
                  

            </div>
            <div class="card-action">
              <button type="submit" class="btn btn-success">Update</button>
            </div>
        </form>
          </div>
        </div>
      </div>
    </div>
  </div>

@endsection