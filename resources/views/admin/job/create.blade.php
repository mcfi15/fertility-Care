@extends('layouts.admin')

@section('title', 'Add New Job')

@section('content')

<div class="container">
    <div class="page-inner">
      <div class="page-header">
        <h3 class="fw-bold mb-3">Add New Job</h3>
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
            <a href="{{ url('admin/jobs') }}">Jobs</a>
          </li>
          <li class="separator">
            <i class="icon-arrow-right"></i>
          </li>
          <li class="nav-item">
            <a href="#">New Job</a>
          </li>
        </ul>
      </div>
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header">
                <div class="d-flex align-items-center">
                <h4 class="card-title">Add New Job</h4>
                <a href="{{ url('admin/jobs') }}" class="btn btn-primary btn-round ms-auto">
                    <i class="fa fa-arrow-left"></i>
                    Back
                </a>
                </div>
            </div>
            <form action="{{ url('admin/jobs/create') }}" method="POST" enctype="multipart/form-data">
                @csrf
            <div class="card-body">
              <div class="row">
                @include('layouts.alert.msg')
                
                
                <div class="col-md-6 col-lg-6">
                    <div class="form-group">
                        <label for="title">Job Title</label>
                        <input type="text" class="form-control" name="title" id="title" value="{{ old('title') }}" placeholder="Name" />
                        @error('title')
                                <small class="text-danger">{{ $message }}</small>  
                        @enderror
                      </div>
                </div>

                <div class="col-md-6 col-lg-6">
                  <div class="form-group">
                      <label for="slug">Slug <span style="color:red;"><small>(Copy and paste title here)</small></span></label>
                      <input type="text" class="form-control" name="slug" id="slug" value="{{ old('slug') }}"  placeholder="slug" />
                      @error('slug')
                          <small class="text-danger">{{ $message }}</small>  
                      @enderror
                    </div>
                </div>

                <div class="col-md-6 col-lg-6">
                  <div class="form-group">
                      <label for="location">Location</label>
                      <input type="text" class="form-control" name="location" id="location" value="{{ old('location') }}" placeholder="location" />
                      @error('location')
                              <small class="text-danger">{{ $message }}</small>  
                          @enderror
                    </div>
                </div>

                <div class="col-md-6 col-lg-6">
                  <div class="form-group">
                      <label for="position">Position</label>
                      <input type="text" class="form-control" name="position" id="position" value="{{ old('position') }}" placeholder="position"  />
                      @error('position')
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
                      Checked = Expired, Unchecked = Active
                      @error('status')
                            <small class="text-danger">{{ $message }}</small>  
                        @enderror
                    </div>
                </div>
                <div class="col-md-12 col-lg-12">
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
                      <label for="closing_date">Job Closing Date </label>
                      <input type="date" name="closing_date" class="form-control" id="closing_date" placeholder="Job Closing Date">
                      @error('closing_date')
                                <small class="text-danger">{{ $message }}</small>  
                            @enderror
                    </div>
                  </div>

                <div class="col-md-6 col-lg-6">
                  <div class="form-group">
                    <label for="eligibility">Eligibility Criteria </label>
                    <textarea name="eligibility" class="form-control" id="eligibility" placeholder="Eligibility Criteria"></textarea>
                    @error('eligibility')
                              <small class="text-danger">{{ $message }}</small>  
                          @enderror
                  </div>
                </div>

                <div class="col-md-6 col-lg-6">
                  <div class="form-group">
                    <label for="type">Employment Type </label>
                    <textarea name="type" class="form-control" id="type" placeholder="Employment Type"></textarea>
                    @error('type')
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