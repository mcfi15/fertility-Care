@extends('layouts.front')

@section('title', 'HR Service')

@section('meta_title', $appSetting->meta_title)

@section('meta_description', $appSetting->meta_description)

@section('meta_keywords', $appSetting->meta_keywords)

@section('content')

<!-- Header Start -->
<div class="container-fluid bg-breadcrumb">
    <div class="bg-breadcrumb-single"></div>
    <div class="container text-center py-5" style="max-width: 900px;">
        <h4 class="text-white display-4 mb-4 wow fadeInDown" data-wow-delay="0.1s">HR Service</h4>
        <ol class="breadcrumb justify-content-center mb-0 wow fadeInDown" data-wow-delay="0.3s">
            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
            <li class="breadcrumb-item active text-primary">HR Service</li>
        </ol>    
    </div>
</div>
<!-- Header End -->

<!-- About Start -->
<div class="container-fluid about bg-light py-5">
    <div class="container py-5">
        <div class="row g-5 align-items-center">
            <div class="col-lg-6 col-xl-5 wow fadeInLeft" data-wow-delay="0.1s">
                <div class="about-img">
                    <img src="{{ asset('uploads/img/hr.jpg') }}" class="img-fluid w-100 rounded-top bg-white" alt="Image">
                    
                </div>
            </div>
            <div class="col-lg-6 col-xl-7 wow fadeInRight" data-wow-delay="0.3s">
                
                <h1 class="display-5 mb-4">HR Services</h1>
                <p class="text ps-4 mb-4">We help companies with recruitment needs, resume analysis, training processes, and interview techniques. </p>

                <p class="text ps-4 mb-4">Call us today for a quote.</p>
                
            </div>
        </div>
    </div>
</div>
<!-- About End -->



@endsection