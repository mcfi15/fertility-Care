@extends('layouts.admin')

@section('title', 'Edit Testimonial')

@section('content')

<div class="container">
    <div class="page-inner">
      <div class="page-header">
        <h3 class="fw-bold mb-3">Edit Testimonial</h3>
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
            <a href="{{ url('admin/testimonials') }}">All Testimonials</a>
          </li>
          <li class="separator">
            <i class="icon-arrow-right"></i>
          </li>
          <li class="nav-item">
            <a href="#">Edit Testimonial</a>
          </li>
        </ul>
      </div>
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header">
                <div class="d-flex align-items-center">
                <h4 class="card-title">Edit Testimonial</h4>
                <a href="{{ url('admin/testimonials') }}" class="btn btn-primary btn-round ms-auto">
                    <i class="fa fa-arrow-left"></i>
                    Back
                </a>
                </div>
            </div>
            <form action="{{ url('admin/testimonials/'.$testimonial->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
            <div class="card-body">
              <div class="row">
                @include('layouts.alert.msg')
                
                
                <div class="col-md-6 col-lg-6">
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" name="name" id="name"  placeholder="name" value="{{ $testimonial->name }}"/>
                        @error('name')
                            <small class="text-danger">{{ $message }}</small>  
                        @enderror
                      </div>
                </div>

                <div class="col-md-6 col-lg-6">
                    <div class="form-group">
                        <label for="position">Position</label>
                        <input type="text" class="form-control" name="position" id="position"  placeholder="position" value="{{ $testimonial->position }}" />
                        @error('position')
                            <small class="text-danger">{{ $message }}</small>  
                        @enderror
                      </div>
                </div>

                <div class="col-md-6 col-lg-6">
                    <div class="form-group">
                        <img src="{{ asset($testimonial->image) }}" alt="">
                      <label for="image">Image <span style="color:red;"><small>(optional)</small></span></label>
                      <input type="file" class="form-control" name="image" id="image"   />
                      @error('image')
                                  <small class="text-danger">{{ $message }}</small>  
                              @enderror
                    </div>
                  </div>

                  <div class="col-md-6 col-lg-6">
                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea name="description" class="form-control" id="description">{{ $testimonial->description }}</textarea>
                        @error('description')
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