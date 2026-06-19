@extends('layouts.front')

@section('title', 'About page')

@section('meta_title', $appSetting->meta_title)

@section('meta_description', $appSetting->meta_description)

@section('meta_keywords', $appSetting->meta_keywords)

@section('content')

<!--====== Page Title Start ======-->
    <section class="page-title-area page-title-bg" style="background-image: url(assets/img/section-bg/page-title.html);">
        <div class="container">
            <h1 class="page-title">Testimonials</h1>

            <ul class="breadcrumb-nav">
                <li><a href="{{ url('/') }}">Home</a></li>
                <li><i class="fas fa-angle-right"></i></li>
                <li>Testimonials</li>
            </ul>
        </div>
    </section>
    <!--====== Page Title End ======-->


 <!--====== Testimonials Section Start ======-->
    <section class="testimonial-section bg-color-grey section-have-half-bg">
        <div class="container-fluid">
            <div class="row justify-content-end">
                <div class="col-lg-6">
                    <div class="testimonial-one-wrap">
                        <div class="section-heading mb-50">
                            <span class="tagline">Our Testimonials</span>
                            <h2 class="title">What Our Patients Say About Our Medical</h2>
                        </div>
                        <div class="testimonial-slider-one">
                            @forelse($testimonials as $testimonial)
                            <div class="single-testimonial-slider">
                                <div class="testimonial-inner">
                                    <div class="avatar">
                                        <img src="{{ asset($testimonial->image) }}" alt="Avatar">
                                    </div>
                                    <div class="content-wrap">
                                        <p class="testimonial-desc">
                                            {{ $testimonial->description }}
                                        </p>
                                        <div class="author-info">
                                            <h5 class="name">{{ $testimonial->name }}</h5>
                                            <span class="title">{{ $testimonial->position }}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @empty

                            <div>
                                <h4>No Data Found</h4>
                            </div>
                                
                            @endforelse
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="section-half-bg" style="background-image: url({{ asset('assets/front/img/section-bg/half-bg-img-01.jpg') }});"></div>
    </section>
    <!--====== Testimonials Section End ======-->


@endsection