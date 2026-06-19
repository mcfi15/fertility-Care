@extends('layouts.admin')

@section('title', 'About Page')

@section('content')

<div class="container">
    <div class="page-inner">
      <div class="page-header">
        <h3 class="fw-bold mb-3">Update About</h3>
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
            <a href="{{ url('admin/about') }}">About</a>
          </li>
          <li class="separator">
            <i class="icon-arrow-right"></i>
          </li>
          <li class="nav-item">
            <a href="#">about</a>
          </li>
        </ul>
      </div>
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header">
                <div class="d-flex align-items-center">
                <h4 class="card-title">About</h4>
                
                </div>
            </div>
            <form action="{{ url('admin/about/'.$about->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
            <div class="card-body">
              <div class="row">
                @include('layouts.alert.msg')
                
                
                <div class="col-md-6 col-lg-6">
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" class="form-control" name="title" id="title"  placeholder="title" value="{{ $about->title }}" />
                        @error('title')
                            <small class="text-danger">{{ $message }}</small>  
                        @enderror
                      </div>
                </div>

                

                <div class="col-md-6 col-lg-6">
                    <div class="form-group">
                        <img src="{{ asset($about->image) }}" alt="" height="80" width="80">
                        <br>
                      <label for="image">Image <span style="color:red;"><small>(optional)</small></span></label>
                      <input type="file" class="form-control" name="image" id="image"   />
                      @error('image')
                                  <small class="text-danger">{{ $message }}</small>  
                              @enderror
                    </div>
                  </div>

                <div class="col-md-6 col-lg-6">
                    <div class="form-group">
                      <label for="description">Description <span style="color:red;"><small>(optional)</small></span></label>
                      <textarea name="description" class="form-control" id="description" placeholder="Enter Description">{{ $about->description }}</textarea>
                      @error('description')
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