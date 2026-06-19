@extends('layouts.front')

@section('title', $appSetting->meta_title)

@section('meta_title', $appSetting->meta_title)

@section('meta_description', $appSetting->meta_description)

@section('meta_keywords', $appSetting->meta_keywords)

@section('content')

    <!--====== Hero Slider Start ======-->
    <section class="hero-slider hero-slider-two style-two">
        <div class="hero-slider-active">
            @foreach ($sliders as $key => $slider)
            <div class="single-hero-slider {{ $key == 0 ? 'active':'' }}">
                <div class="hero-slider-bg bg-size-cover" style="background-image: url({{ asset($slider->image) }});"></div>
                <div class="container">
                    <div class="row">
                        <div class="col-lg-9 col-md-9">
                            <div class="hero-content">
                                <span class="tagline" data-animation="fadeInDown" data-delay="0.5s">{{ $slider->description }}</span>
                                <h1 class="title" data-animation="fadeInLeft" data-delay="0.6s">{{ $slider->title }}</h1>
                                <a href="{{ url('contact') }}" class="template-btn template-btn-bordered" data-animation="fadeInUp" data-delay="0.7s">Explore Our Service <i class="far fa-plus"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <div class="hero-slider-arrow"></div>
    </section>
    <!--====== Hero Slider End ======-->

    <!--====== Features Section Start ======-->
    <section class="feature-section pharmacy-feature">
        <div class="container wow fadeInUp" data-wow-delay="0.3s">
            <div class="row no-gutters justify-content-center feature-loop">
                <div class="col-lg-4 col-md-6 col-sm-10">
                    <div class="iconic-box-three">
                        <div class="icon">
                            <i class="{{ $appSetting->feature1_icon ?? 'flaticon-medicine' }}"></i>
                        </div>
                        <h4 class="title">{{ $appSetting->feature1_title ?? 'Medicine Care' }}</h4>
                        <p>{{ $appSetting->feature1_description ?? 'Sharing trusted updates on fertility medicines, treatment protocols, and breakthroughs that bring new possibilities for patients and providers.' }}</p>
                        <a href="#" class="box-link">Read More <i class="far fa-plus"></i></a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-10">
                    <div class="iconic-box-three featured-box">
                        <div class="icon">
                            <i class="{{ $appSetting->feature2_icon ?? 'flaticon-stethoscope' }}"></i>
                        </div>
                        <h4 class="title">{{ $appSetting->feature2_title ?? 'Doctors Services' }}</h4>
                        <p>{{ $appSetting->feature2_description ?? 'Dedicated to keeping fertility specialists and healthcare professionals informed with the latest clinical insights, best practices, and innovations in reproductive care.' }}</p>
                        <a href="#" class="box-link">Read More <i class="far fa-plus"></i></a>
                        <span class="big-icon"><i class="{{ $appSetting->feature2_icon ?? 'flaticon-stethoscope' }}"></i></span>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-10">
                    <div class="iconic-box-three">
                        <div class="icon">
                            <i class="{{ $appSetting->feature3_icon ?? 'flaticon-flask' }}"></i>
                        </div>
                        <h4 class="title">{{ $appSetting->feature3_title ?? 'Medical Equipment' }}</h4>
                        <p>{{ $appSetting->feature3_description ?? 'Highlighting advanced fertility equipment, cutting-edge technologies, and tools that support precision, safety, and excellence in reproductive healthcare.' }}</p>
                        <a href="#" class="box-link">Read More <i class="far fa-plus"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--====== Features Section End ======-->

    <!--====== About Section Start ======-->
    <section class="about-section section-gap">
        <div class="container">
            <div class="row justify-content-lg-between justify-content-center align-items-center">
                <div class="col-lg-6 col-md-10">
                    <div class="circle-image-gallery mb-md-50">
                        <div class="row">
                            <div class="col-6 gallery-left">
                                <div class="single-img wow fadeInLeft" data-wow-delay="0.3s">
                                    <img src="{{ asset($appSetting->about_image ?? 'assets/front/img/circle-image-gallery/01.jpg') }}" alt="{{ $appSetting->about_title ?? 'About Us' }}">
                                </div>
                                <div class="single-img wow fadeInRight" data-wow-delay="0.4s">
                                    <img src="{{ asset('assets/front/img/circle-image-gallery/04.jpg') }}" alt="">
                                </div>
                            </div>
                            <div class="col-6 gallery-right">
                                <div class="single-img wow fadeInRight" data-wow-delay="0.5s">
                                    <img class="animate-float-bob-y"  src="{{ asset('assets/front/img/circle-image-gallery/03.jpg') }}" alt="">
                                </div>
                                <div class="single-img wow fadeInLeft" data-wow-delay="0.6s">
                                    <img src="{{ asset('assets/front/img/circle-image-gallery/02.jpg') }}" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-5 col-lg-6 col-md-8">
                    <div class="about-text">
                        <div class="section-heading mb-35">
                            <span class="tagline">About {{ $appSetting->website_name }}</span>
                            <h2 class="title">{{ $appSetting->about_title ?? 'All-in-One Worksite Health Solution' }}</h2>
                            <p>{{ $appSetting->exp ?? '0' }} Years Of Experience in Medical Services</p>
                        </div>
                        <p>
                            {{ $about->description ?? '' }}
                        </p>
                        <a href="{{ url($appSetting->about_button_link ?? '/about') }}" class="template-btn mt-40">{{ $appSetting->about_button_text ?? 'Learn More' }} <i class="far fa-plus"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--====== About Section End ======-->

    <!--====== Latest Blog Start ======-->
    <section class="latest-blog-section bg-color-grey section-gap">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6 col-md-9">
                    <div class="section-heading text-center mb-40">
                        <span class="tagline color-tertiary">Get familiar</span>
                        <h2 class="title">What are the Creighton Method and NaProTECHNOLOGY?</h2>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center latest-blog-loop">
                @forelse($products as $product)
                <div class="col-lg-4 col-md-6 col-sm-10">
                    <div class="latest-blog-two style-two mt-30">
                        <div class="thumbnail">
                            <img src="{{ asset($product->image) }}" alt="Image" height="300">
                        </div>
                        <div class="blog-content">
                            <h4 class="blog-title">
                                <a href="blog-details.html">{{ $product->title }}</a>
                            </h4>
                            <p>
                                {{ $product->small_description }}
                            </p>
                            <a href="{{ $product->slug }}" class="template-btn">Read More <i class="far fa-plus"></i></a>
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
    </section>
    <!--====== Latest Blog End ======-->

    <!--====== FAQ Section Start ======-->
    <section class="faq-section section-gap">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-7">
                    <div class="faq-page-content pr-xl-4">
                        <h3 class="faq-title">{{ $appSetting->faq_heading ?? 'Frequently Asked Questions' }}</h3>
                        <p class="mb-35">
                            We frequently receive a large number of enquiries and questions in the following areas:
                        </p>
                        <div class="accordion" id="accordionFaq">
                            @forelse ($faqs as $index => $faq)
                            <div class="accordion-item {{ $index == 1 ? 'active-accordion' : '' }}">
                                <div class="accordion-header">
                                    <h6 data-toggle="collapse" aria-expanded="{{ $index == 1 ? 'true' : 'false' }}" data-target="#faqItem{{ $faq->id }}">
                                        <span>{{ $faq->question }}</span>
                                    </h6>
                                </div>
                                <div class="collapse {{ $index == 1 ? 'show' : '' }}" id="faqItem{{ $faq->id }}" data-parent="#accordionFaq">
                                    <div class="accordion-content">
                                        <p>{{ $faq->answer }}</p>
                                    </div>
                                </div>
                            </div>
                            @empty
                            <p class="text-muted">No FAQs available at the moment.</p>
                            @endforelse
                        </div>
                    </div>
                </div>
                <div class="col-lg-5 col-md-10">
                    <div class="faq-sidebar">
                        <div class="search-widget mb-50">
                            <h3 class="search-title">Frequently Asked Questions</h3>
                            <form action="#">
                                <input type="search" placeholder="Search Here">
                                <button type="submit"><i class="fas fa-search"></i></button>
                            </form>
                        </div>
                        <div class="video-widget">
                            <img src="{{ asset('assets/front/img/section-img/faq-video.jpg') }}" alt="Video">
                            <a href="https://www.youtube.com/watch?v=U3ASj1L6_sY" class="video-popup">
                                <i class="fas fa-play"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--====== FAQ Section End ======-->

@endsection