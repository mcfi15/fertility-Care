@extends('layouts.front')

@section('title', 'Appointment page')

@section('meta_title', $appSetting->meta_title)

@section('meta_description', $appSetting->meta_description)

@section('meta_keywords', $appSetting->meta_keywords)

@section('content')

<!--====== Page Title Start ======-->
    <section class="page-title-area page-title-bg" style="background-image: url(assets/img/section-bg/page-title.html);">
        <div class="container">
            <h1 class="page-title">Appointment</h1>

            <ul class="breadcrumb-nav">
                <li><a href="{{ url('/') }}">Home</a></li>
                <li><i class="fas fa-angle-right"></i></li>
                <li>Appointment</li>
            </ul>
        </div>
    </section>
    <!--====== Page Title End ======-->


    <!--====== Appointment Section Start ======-->
    <section class="appointment-section section-gap">
        <div class="container container-1500">
            <div class="appointment-form-two style-two">
                <div class="appointment-image" style="background-image: url(assets/img/appointment/03.html);">
                </div>
                <div class="form-wrap">
                    <div class="section-heading mb-50">
                        <span class="tagline">Make an Appointment</span>
                        <h2 class="title">Fill-up The Form to Get Our Medical Services </h2>
                    </div>
                    @include('layouts.alert.msg')
                    <form action="{{ url('appointment/store') }}" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="input-field">
                                    <input type="text" name="name" placeholder="Your Full Name" value="{{ old('name') }}">
                                    @error('name')
                                        <small class="text-danger">{{ $message }}</small>  
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="input-field">
                                    <input type="email" name="email" placeholder="Email Address" value="{{ old('email') }}">
                                    @error('email')
                                        <small class="text-danger">{{ $message }}</small>  
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="input-field">
                                    <input type="date" name="appointment_date" value="{{ old('appointment_date') }}">
                                    @error('appointment_date')
                                        <small class="text-danger">{{ $message }}</small>  
                                    @enderror
                                </div>
                            </div>
                            
                            <div class="col-md-6">
                                <div class="input-field">
                                    <input type="time" name="appointment_time" value="{{ old(key: 'appointment_time') }}">
                                    @error('appointment_time')
                                        <small class="text-danger">{{ $message }}</small>  
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="input-field">
                                    <input type="text" name="duration" placeholder="duration" value="{{ old('duration') }}">
                                    @error('duration')
                                        <small class="text-danger">{{ $message }}</small>  
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="input-field">
                                    <select name="location">
                                        <option value="" selected disabled>Location</option>
                                        <option value="Clinic/Branch Name">Clinic/Branch Name</option>
                                        
                                    </select>
                                    @error('location')
                                        <small class="text-danger">{{ $message }}</small>  
                                    @enderror
                                </div>
                            </div>
                            
                            <div class="col-md-12">
                                <div class="input-field">
                                    <select name="appointment_type">
                                        <option value="" selected disabled>Appointment Type</option>
                                        <option value="Fertility Assessment">Fertility Assessment</option>
                                        <option value="IVF Consultation">IVF Consultation</option>
                                        <option value="Prenatal Check-up">Prenatal Check-up</option>
                                        <option value="Hormonal Test Review">Hormonal Test Review</option>
                                        <option value="Ultrasound Scan">Ultrasound Scan</option>
                                        <option value="Follow-up Visit">Follow-up Visit</option>
                                    </select>
                                    @error('appointment_type')
                                        <small class="text-danger">{{ $message }}</small>  
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-12">
                                
                                <div class="input-field">
                                    <textarea name="reason" id="reason" class="input-field" placeholder="Type your reason here">{{ old('reason') }}</textarea>
                                    @error('reason')
                                        <small class="text-danger">{{ $message }}</small>  
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="input-field">
                                    <button type="submit" class="template-btn">
                                        Make an Appointment <i class="far fa-plus"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <!--====== Appointment Section End ======-->


@endsection