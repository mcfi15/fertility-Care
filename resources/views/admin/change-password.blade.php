@extends('layouts.admin')

@section('title', 'Change Password')

@section('content')

<div class="container">
    <div class="page-inner">
      <div class="page-header">
        <h3 class="fw-bold mb-3">Change Password</h3>
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
            <a href="#">Change Password</a>
          </li>
        </ul>
      </div>
      <div class="row justify-content-center">
        <div class="col-md-8">
          <div class="card">
            <div class="card-header">
                <div class="d-flex align-items-center">
                <h4 class="card-title">Change Password</h4>
                
                </div>
            </div>
            <form action="{{ url('admin/change-password') }}" method="POST" >
                @csrf
            <div class="card-body">
              <div class="row">
                @include('layouts.alert.msg')
                
                
                <div class="col-md-12 col-lg-12">
                    <div class="form-group">
                        <label for="current_password">Current Password</label>
                        <input type="password" class="form-control" name="current_password" id="current_password"  placeholder="Current Password" />
                        @error('current_password')
                                <small class="text-danger">{{ $message }}</small>  
                            @enderror
                      </div>
                </div>

                <div class="col-md-12 col-lg-12">
                    <div class="form-group">
                      <label for="password">New Password</label>
                      <input type="password" class="form-control" name="password" id="password" placeholder="New Password" />
                      @error('password')
                                  <small class="text-danger">{{ $message }}</small>  
                              @enderror
                    </div>
                </div>

                  <div class="col-md-12 col-lg-12">
                    <div class="form-group">
                        <label for="password_confirmation">Confirm Password</label>
                        <input type="password" class="form-control" name="password_confirmation" id="password_confirmation"  placeholder="Confirm Password" />
                        @error('password_confirmation')
                                <small class="text-danger">{{ $message }}</small>  
                            @enderror
                      </div>
                </div>
                  
                  

            </div>
            <div class="card-action">
              <button type="submit" class="btn btn-success">Update Password</button>
            </div>
        </form>
          </div>
        </div>
      </div>
    </div>
  </div>

@endsection