@extends('layouts.admin')

@section('title', 'Update Slider')

@section('content')

<div class="container">
    <div class="page-inner">
      <div class="page-header">
        <h3 class="fw-bold mb-3">Update Slider</h3>
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
            <a href="{{ url('admin/sliders') }}">All Sliders</a>
          </li>
          <li class="separator">
            <i class="icon-arrow-right"></i>
          </li>
          <li class="nav-item">
            <a href="#">Update Slider</a>
          </li>
        </ul>
      </div>
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header">
                <div class="d-flex align-items-center">
                <h4 class="card-title">Update Slider</h4>
                <a href="{{ url('admin/sliders') }}" class="btn btn-primary btn-round ms-auto">
                    <i class="fa fa-arrow-left"></i>
                    Back
                </a>
                </div>
            </div>
            <form action="{{ url('admin/sliders/'.$slider->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

            <div class="card-body">
              <div class="row">
                @include('layouts.alert.msg')
                
                
                <div class="col-md-6 col-lg-6">
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" class="form-control" name="title" id="title" value="{{ $slider->title }}"  placeholder="Title" />
                        @error('title')
                                <small class="text-danger">{{ $message }}</small>  
                            @enderror
                      </div>
                </div>

                <div class="col-md-6 col-lg-6">
                    <div class="form-group">
                        <img src="{{ asset("$slider->image") }}" alt="Slider" width="70" height="70"> <br><br>
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
                      <textarea name="description" class="form-control" id="description" placeholder="Enter Description">{{ $slider->description }}</textarea>
                      @error('description')
                                <small class="text-danger">{{ $message }}</small>  
                            @enderror
                    </div>
                  </div>
                  <div class="col-md-6 col-lg-6">
                      <div class="form-group">
                          <label for="status">Status</label> <br>
                          <input type="checkbox" name="status" {{ $slider->status == '1' ? 'checked' : ''}} id="status"  /> <br>
                          Checked = Hidden, Unchecked = Visible
                          @error('status')
                                <small class="text-danger">{{ $message }}</small>  
                            @enderror
                        </div>
                  </div>
                  

            </div>
            <div class="card-action">
              <button type="submit" class="btn btn-success">Update Slider</button>
            </div>
        </form>
          </div>
        </div>
      </div>
    </div>
  </div>

@endsection