@extends('layouts.front')

@section('title', 'Worker')

@section('meta_title', $appSetting->meta_title)

@section('meta_description', $appSetting->meta_description)

@section('meta_keywords', $appSetting->meta_keywords)

@section('content')

<!-- Header Start -->
<div class="container-fluid bg-breadcrumb">
    <div class="bg-breadcrumb-single"></div>
    <div class="container text-center py-5" style="max-width: 900px;">
        <h4 class="text-white display-4 mb-4 wow fadeInDown" data-wow-delay="0.1s">Worker</h4>
        <ol class="breadcrumb justify-content-center mb-0 wow fadeInDown" data-wow-delay="0.3s">
            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
            <li class="breadcrumb-item active text-primary">Worker</li>
        </ol>    
    </div>
</div>
<!-- Header End -->

<!-- About Start -->
<div class="container-fluid about bg-light py-5">
    <div class="container py-5">
        <div class="row g-5 align-items-center">
            <div class="col-lg-6 col-xl-7 wow fadeInRight" data-wow-delay="0.3s">
                
                <h1 class="display-5 mb-4">Workers</h1>
                <p class="text ps-4 mb-4">Our team of expert care managers screen all prospective employers. This process helps to ensure that your work experience is in a fulfilling and secure environment. </p>

                <p class="text ps-4 mb-4">Your qualifications and preferences will be carefully considered when making referrals to prospective employers. You will be provided with information regarding available jobs, job requirements and duties, hours of work, salary and benefits. We are committed to helping you find the organisation most suited to your employment needs.
                </p>
                
            </div>
            <div class="col-lg-6 col-xl-5 wow fadeInLeft" data-wow-delay="0.1s">
                <div class="about-img">
                    <img src="{{ asset('uploads/img/R.jpeg') }}" class="img-fluid w-100 rounded-top bg-white" alt="Image">
                    
                </div>
            </div>
            
        </div>
    </div>
</div>
<!-- About End -->



@endsection