@extends('layouts.admin')

@section('title', 'Update Category')

@section('content')

<div class="container">
    <div class="page-inner">
      <div class="page-header">
        <h3 class="fw-bold mb-3">Update Category</h3>
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
            <a href="{{ url('admin/category') }}">All Categories</a>
          </li>
          <li class="separator">
            <i class="icon-arrow-right"></i>
          </li>
          <li class="nav-item">
            <a href="#">Update Category</a>
          </li>
        </ul>
      </div>
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header">
                <div class="d-flex align-items-center">
                <h4 class="card-title">Update Category</h4>
                <a href="{{ url('admin/category') }}" class="btn btn-primary btn-round ms-auto">
                    <i class="fa fa-arrow-left"></i>
                    Back
                </a>
                </div>
            </div>
            <form action="{{ url('admin/category/'.$category->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

            <div class="card-body">
              <div class="row">
                @include('layouts.alert.msg')
                
                
                <div class="col-md-6 col-lg-6">
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" name="name" id="name" value="{{ $category->name }}"  placeholder="name" />
                        @error('name')
                                <small class="text-danger">{{ $message }}</small>  
                            @enderror
                      </div>
                </div>

                <div class="col-md-6 col-lg-6">
                  <div class="form-group">
                      <label for="slug">Slug <span style="color:red;"><small>(Copy and paste name here)</small></span></label>
                      <input type="text" class="form-control" name="slug" id="slug" value="{{ $category->slug }}"  placeholder="Slug" readonly/>
                      @error('slug')
                              <small class="text-danger">{{ $message }}</small>  
                          @enderror
                    </div>
              </div>

                <div class="col-md-6 col-lg-6">
                    <div class="form-group">
                        <img src="{{ asset("$category->image") }}" alt="Category" width="70" height="70"> <br><br>
                      <label for="image">Image</label>
                      <input type="file" class="form-control" name="image" id="image"   />
                      @error('image')
                                  <small class="text-danger">{{ $message }}</small>  
                              @enderror
                    </div>
                  </div>

                <div class="col-md-6 col-lg-6">
                    <div class="form-group">
                      <label for="description">Description</label>
                      <textarea name="description" class="form-control" id="description" placeholder="Enter Description">{{ $category->description }}</textarea>
                      @error('description')
                                <small class="text-danger">{{ $message }}</small>  
                            @enderror
                    </div>
                  </div>
                  
            </div>
            <div class="card-action">
              <button type="submit" class="btn btn-success">Update Category</button>
            </div>
        </form>
          </div>
        </div>
      </div>
    </div>
  </div>

@endsection