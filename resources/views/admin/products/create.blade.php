@extends('layouts.admin')

@section('title', 'Add New Product')

@section('content')

<div class="container">
    <div class="page-inner">
      <div class="page-header">
        <h3 class="fw-bold mb-3">Add New Product</h3>
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
            <a href="#">New Product</a>
          </li>
        </ul>
      </div>
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header">
                <div class="d-flex align-items-center">
                <h4 class="card-title">Add New Product</h4>
                <a href="{{ url('admin/products') }}" class="btn btn-primary btn-round ms-auto">
                    <i class="fa fa-arrow-left"></i>
                    Back
                </a>
                </div>
            </div>
            
            <form action="{{ url('admin/products/create') }}" method="POST" enctype="multipart/form-data">
                @csrf
            <div class="card-body">
              <div class="row">
                @include('layouts.alert.msg')
                
                <div class="col-md-6 col-lg-6">
                    <div class="form-group">
                        <label for="title">Name</label>
                        <input type="text" class="form-control" name="title" id="title" value="{{ old('title') }}" placeholder="Name" />
                        @error('title')
                                <small class="text-danger">{{ $message }}</small>  
                            @enderror
                      </div>
                </div>

                <div class="col-md-6 col-lg-6">
                  <div class="form-group">
                      <label for="price">Price</label>
                      <input type="text" class="form-control" name="price" id="price" value="{{ old('price') }}" placeholder="price" />
                      @error('price')
                              <small class="text-danger">{{ $message }}</small>  
                          @enderror
                    </div>
                </div>

                <div class="col-md-6 col-lg-6">
                  <div class="form-group">
                      <label for="image">Featured Image</label>
                      <input type="file" class="form-control" name="image" id="image" required />
                      @error('image')
                              <small class="text-danger">{{ $message }}</small>  
                          @enderror
                    </div>
                </div>

                <hr>

                <div class="col-md-6 col-lg-6">
                  <div class="form-group">
                    <label for="small_description">Small Description </label>
                    <textarea name="small_description" class="form-control" id="small_description" placeholder="Enter Description"></textarea>
                    @error('small_description')
                              <small class="text-danger">{{ $message }}</small>  
                          @enderror
                  </div>
                </div>

                <div class="col-md-6 col-lg-6">
                  <div class="form-group">
                      <label for="status">Status</label> <br>
                      <input type="checkbox" name="status" id="status"  /> <br>
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
                          <option value="{{ $category->id }}">{{ $category->name }}</option>
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
                    <textarea name="description" class="form-control" id="description" placeholder="Enter Description"></textarea>
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
                  </div>
                </div>

                <div class="col-md-6 col-lg-6">
                  <div class="form-group">
                      <label for="meta_title">Meta Title <span style="color:red;"><small>(optional)</small></span></label>
                      <input type="text" class="form-control" name="meta_title" value="{{ old('meta_title') }}" id="meta_title"  placeholder="meta title" />
                      @error('meta_title')
                              <small class="text-danger">{{ $message }}</small>  
                          @enderror
                    </div>
                </div>

                <div class="col-md-6 col-lg-6">
                  <div class="form-group">
                    <label for="meta_description">Meta Description <span style="color:red;"><small>(optional)</small></span></label>
                    <textarea name="meta_description" class="form-control" id="meta_description" placeholder="Meta Description"></textarea>
                    @error('meta_description')
                              <small class="text-danger">{{ $message }}</small>  
                          @enderror
                  </div>
                </div>

                <div class="col-md-6 col-lg-6">
                  <div class="form-group">
                    <label for="meta_keywords">Meta Keywords <span style="color:red;"><small>(optional)</small></span></label>
                    <textarea name="meta_keywords" class="form-control" id="meta_keywords" placeholder="Meta Keywords"></textarea>
                    @error('meta_keywords')
                              <small class="text-danger">{{ $message }}</small>  
                          @enderror
                  </div>
                </div>
                  

            </div>
            <div class="card-action">
              <button type="submit" class="btn btn-success">Save</button>
            </div>
        </form>
          </div>
        </div>
      </div>
    </div>
  </div>

@endsection