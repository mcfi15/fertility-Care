@extends('layouts.front')

@section('title', $jobs->title)

@section('meta_title', $appSetting->meta_title)

@section('meta_description', $appSetting->meta_description)

@section('meta_keywords', $appSetting->meta_keywords) 

@section('content')

<!-- Header Start -->
<div class="container-fluid bg-breadcrumb">
    <div class="container text-center py-5" style="max-width: 900px;">
        <h4 class="text-white display-4 mb-4 wow fadeInDown" data-wow-delay="0.1s">Application Form</h4>
        <ol class="breadcrumb d-flex justify-content-center mb-0 wow fadeInDown" data-wow-delay="0.3s">
            <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
            <li class="breadcrumb-item active text-primary">Application Form</li>
        </ol>    
    </div>
</div>
<!-- Header End -->
</div>
<!-- Navbar & Hero End -->

@include('layouts.inc.frontend.searchbar')

<!-- Contact Start -->
<div class="container-fluid contact bg-light py-5">
    <div class="container py-5">
        <div class="row g-5 justify-content-center">
            <div class="col-lg-8 h-100 wow fadeInUp" data-wow-delay="0.2s">
                <div class="text-center mx-auto pb-5" style="max-width: 800px;">
                    <h4 class="text-uppercase text-primary">Apply Here</h4>
                </div>
                @include('layouts.alert.msg')
                <form action="{{ url('application') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="job_title" value="{{ $jobs->title }}" id="">
                    <div class="row g-4">
                        <div class="col-lg-12 col-xl-6">
                            <div class="form-floating">
                                <input type="text" name="firstname" class="form-control border-0" id="fname" placeholder="First Name" value="{{ old('firstname') }}">
                                <label for="firstname">First Name</label>
                            </div>
                            @error('fname')
                                    <small class="text-danger">{{ $message }}</small>  
                                @enderror
                        </div>
                        <div class="col-lg-12 col-xl-6">
                            <div class="form-floating">
                                <input type="text" name="middlename" class="form-control border-0" id="middlename" placeholder="Middle Email" value="{{ old('middlename') }}">
                                <label for="middlename">Middle Name <span style="color: red"><small>(Optional)</small></span></label>
                            </div>
                            @error('middlename')
                                    <small class="text-danger">{{ $message }}</small>  
                                @enderror
                        </div>
                        <div class="col-lg-12 col-xl-6">
                            <div class="form-floating">
                                <input type="text" name="lastname" class="form-control border-0" id="lastname" placeholder="Last Email" value="{{ old('lastname') }}">
                                <label for="lastname">Last Name </label>
                            </div>
                            @error('lastname')
                                    <small class="text-danger">{{ $message }}</small>  
                                @enderror
                        </div>
                        <div class="col-lg-12 col-xl-6">
                            <div class="form-floating">
                                <input type="text" name="email" class="form-control border-0" id="email" placeholder="Your Email" value="{{ old('email') }}">
                                <label for="email">Email </label>
                            </div>
                            @error('email')
                                    <small class="text-danger">{{ $message }}</small>  
                                @enderror
                        </div>
                        <div class="col-lg-12 col-xl-6">
                            <div class="form-floating">
                                <input type="phone" name="phone" class="form-control border-0" id="phone" placeholder="Phone" value="{{ old('phone') }}">
                                <label for="phone">Your Phone <span style="color: red"><small>(Optional)</small></span></label>
                                
                            </div>
                            @error('phone')
                                    <small class="text-danger">{{ $message }}</small>  
                                @enderror
                        </div>
                        <div class="col-lg-12 col-xl-6">
                            <div class="form-floating">
                                <input type="text" name="position" class="form-control border-0" id="position" placeholder="Applied Position" value="{{ old('position') }}">
                                <label for="position">Applied Position</label>
                                
                            </div>
                            @error('phone')
                                    <small class="text-danger">{{ $message }}</small>  
                                @enderror
                        </div>
                        <div class="col-lg-12 col-xl-12">
                            <label for="coverletter">Cover Letter</label>
                            <div class="form-floating">
                                <textarea name="coverletter" class="form-control border-0" id="coverletter" placeholder="Cover Letter">{{ old('coverletter') }}</textarea>
                                
                            </div>
                            @error('coverletter')
                                    <small class="text-danger">{{ $message }}</small>  
                                @enderror
                        </div>
                        <div class="col-lg-12 col-xl-6">
                            <label for="cv">Upload CV <span style="color: red"><small>(PDF Only)</small></span></label>
                            <div class="form-floating">
                                <input type="file"  name="cv" class="form-control border-0" id="cv" >
                                
                            </div>
                            @error('cv')
                                    <small class="text-danger">{{ $message }}</small>  
                                @enderror
                        </div>
                        <div class="col-lg-12 col-xl-6">
                            <label for="other">Upload Any Other Document <span style="color: red"><small>(Optional | PDF Only)</small></span></label>
                            <div class="form-floating">
                                <input type="file"  name="other" class="form-control border-0" id="other" >
                                
                            </div>
                            @error('other')
                                    <small class="text-danger">{{ $message }}</small>  
                                @enderror
                        </div>
                        
            
                        <div class="col-12">
                            <button type="submit" class="btn btn-primary w-100 py-3">Submit Application</button>
                        </div>
                    </div>
                </form>
            </div>
            
        </div>
    </div>
</div>
<!-- Contact End -->

{{-- <div>
    <livewire:frontend.product.order :category="$category" :product="$product" />
</div> --}}

@endsection