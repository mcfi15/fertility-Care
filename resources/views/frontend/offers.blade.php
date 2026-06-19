@extends('layouts.front')

@section('title', 'What we offer')

@section('meta_title', $appSetting->meta_title)

@section('meta_description', $appSetting->meta_description)

@section('meta_keywords', $appSetting->meta_keywords)

@section('content')

<!-- Header Start -->
<div class="container-fluid bg-breadcrumb">
    <div class="bg-breadcrumb-single"></div>
    <div class="container text-center py-5" style="max-width: 900px;">
        <h4 class="text-white display-4 mb-4 wow fadeInDown" data-wow-delay="0.1s">What We Offer</h4>
        <ol class="breadcrumb justify-content-center mb-0 wow fadeInDown" data-wow-delay="0.3s">
            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
            <li class="breadcrumb-item active text-primary">Offers</li>
        </ol>    
    </div>
</div>
<!-- Header End -->

<!-- Blog Start -->
<div class="container-fluid blog py-5">
    <div class="container py-5">
        
        <div class="row g-4 justify-content-center">
            @foreach($offers as $offer)
            <div class="col-md-6 col-lg-6 col-xl-4 wow fadeInUp" data-wow-delay="0.1s">
                <div class="blog-item bg-light rounded p-4" style="background-image: url(img/bg.png);">
                    
                    <div class="project-img">
                        <img src="{{ asset($offer->image) }}" class="img-fluid w-100 rounded" alt="Image">
                        <div class="blog-plus-icon">
                            <a href="{{ asset($offer->image) }}" data-lightbox="blog-1" class="btn btn-primary btn-md-square rounded-pill"><i class="fas fa-plus fa-1x"></i></a>
                        </div>
                    </div>
                    <div class="my-4">
                        <a href="#" class="h4">{{ $offer->name }}</a>
                    </div>
                    <p>{{ $offer->description }}</p>
                </div>
            </div>
            @endforeach
            
        </div>
    </div>
</div>
<!-- Blog End -->


@endsection