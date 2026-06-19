@extends('layouts.front')

@section('title', 'About page')

@section('meta_title', $appSetting->meta_title)

@section('meta_description', $appSetting->meta_description)

@section('meta_keywords', $appSetting->meta_keywords)

@section('content')

<!--====== Page Title Start ======-->
    <section class="page-title-area page-title-bg" style="background-image: url(assets/img/section-bg/page-title.html);">
        <div class="container">
            <h1 class="page-title">About</h1>

            <ul class="breadcrumb-nav">
                <li><a href="{{ url('/') }}">Home</a></li>
                <li><i class="fas fa-angle-right"></i></li>
                <li>About</li>
            </ul>
        </div>
    </section>
    <!--====== Page Title End ======-->

    <!--====== About Section Start ======-->
    <section class="about-section section-gap">
        <div class="container">
            <div class="row justify-content-lg-between justify-content-center align-items-center">
                <div class="col-lg-6 col-md-10">
                    <div class="circle-image-gallery mb-md-50">
                        <div class="row">
                            <div class="col-6 gallery-left">
                                <div class="single-img wow fadeInLeft" data-wow-delay="0.3s">
                                    <img src="{{ asset('assets/front/img/circle-image-gallery/01.jpg') }}" alt="">
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
                            <h2 class="title">{{ $about->title }}</h2>

                            <p>{{ $appSetting->exp }} Years Of Experience in Medical Services</p>
                        </div>
                        <p>
                            {{ $about->description }}
                        </p>
                        
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--====== About Section End ======-->

    <div class="wcu-with-doctors">
        <!--====== Why Choose Section Start ======-->
        <section class="wcu-section section-gap-top">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-10">
                        <div class="section-heading heading-white text-center mb-40">
                            <span class="tagline">Why Choose Our Fertility Care Service</span>
                            <h2 class="title">Breakthrough in Comprehensive, Flexible Care Delivery Models</h2>
                        </div>
                    </div>
                </div>
                <div class="row justify-content-center">
                    <div class="col-lg-4 col-md-6 col-sm-9">
                        <div class="image-title-box mt-30 wow fadeInUp" data-wow-delay="0.3s">
                            <h4 class="title"><a href="service.html">Expert Care, Every Step of the Way</a></h4>

                            <div class="image">
                                <img src="{{ asset('assets/front/img/img-title-box/01.jpg') }}" alt="Image">
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-9">
                        <div class="image-title-box mt-30 wow fadeInUp" data-wow-delay="0.4s">
                            <h4 class="title"><a href="service.html">Advanced Treatments, Trusted Results</a></h4>

                            <div class="image">
                                <img src="{{ asset('assets/front/img/img-title-box/02.jpg') }}" alt="Image">
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-9">
                        <div class="image-title-box mt-30 wow fadeInUp" data-wow-delay="0.5s">
                            <h4 class="title"><a href="service.html">Compassionate Support for Every Family</a></h4>

                            <div class="image">
                                <img src="{{ asset('assets/front/img/img-title-box/03.jpg') }}" alt="Image">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--====== Why Choose Section End ======-->

        <!--====== Doctor Section Start ======-->
        <section class="doctors-section bg-color-grey polygon-pattern-2">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-6 col-md-6">
                        <div class="section-heading text-center mb-40">
                            <span class="tagline">Board Members</span>
                            <h2 class="title">Meet Our Board Members</h2>
                        </div>
                    </div>
                </div>
                <div class="row justify-content-center doctors-loop">
                    @forelse($boards as $board)
                    <div class="col-xl-3 col-lg-4 col-sm-6">
                        <div class="doctor-box-three mt-30 wow fadeInUp" data-wow-delay="0.3s">
                            <div class="doctor-photo">
                                <img src="{{ asset($board->image) }}" alt="Image">
                            </div>
                            <div class="doctor-information">
                                <h5 class="name">
                                    <a href="doctor-details.html">{{ $boards->name }}</a>
                                </h5>
                                <span class="specialty">{{ $board->position }}</span>
                                {{-- <ul class="social-links">
                                    <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                    <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                    <li><a href="#"><i class="fab fa-youtube"></i></a></li>
                                    <li><a href="#"><i class="fab fa-linkedin"></i></a></li>
                                </ul>
                                <span class="plus-icon"><i class="far fa-plus"></i></span> --}}
                            </div>
                        </div>
                    </div>
                    @empty
                    <div>
                        <h4>No Data Available</h4>
                    </div>
                    @endforelse
                </div>
            </div>
        </section>
        <!--====== Doctor Section End ======-->
    </div>

    <!--====== FAQ Section Start ======-->
    {{-- <section class="faq-section section-gap">
        <div class="container">
            <div class="row align-items-center justify-content-center">
                <div class="col-lg-6 col-md-10">
                    <div class="faq-image text-center text-lg-left mb-md-50">
                        <img src="assets/img/section-img/faq-image.html" alt="Image">
                    </div>
                </div>
                <div class="col-lg-6 col-md-9 col-sm-11">
                    <div class="faq-content pl-xl-5">
                        <div class="section-heading mb-30">
                            <span class="tagline">How Can We help</span>
                            <h2 class="title">Flexible & Responsive to Changing Needs</h2>
                        </div>
                        <p>
                            Sed ut perspiciatis unde omnis iste natus error voluptatem accusantium doloremque laudantium totam rem aperieaqueys epsa quae abillo inventore veritatis et quase
                        </p>
                        <div class="accordion accordion-style-two mt-30" id="accordionFaq">
                            <div class="accordion-item">
                                <div class="accordion-header">
                                    <h6 data-toggle="collapse" aria-expanded="true" data-target="#itemOne">
                                        <span>Advanced Equipment and Best Dentists</span>
                                    </h6>
                                </div>
                                <div class="collapse" id="itemOne" data-parent="#accordionFaq">
                                    <div class="accordion-content">
                                        <p>
                                            Orem psum dolor sit amet consectetur adipiscing elit sed do eiusmod tempor incididunt ut labore ets dolore magna aliqua uispsum suspendisse
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item active-accordion">
                                <div class="accordion-header">
                                    <h6 data-toggle="collapse" aria-expanded="true" data-target="#itemTwo">
                                        <span>Our 10 Years Working Experience</span>
                                    </h6>
                                </div>
                                <div class="collapse show" id="itemTwo" data-parent="#accordionFaq">
                                    <div class="accordion-content">
                                        <p>
                                            Orem psum dolor sit amet consectetur adipiscing elit sed do eiusmod tempor incididunt ut labore ets dolore magna aliqua uispsum suspendisse
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <div class="accordion-header">
                                    <h6 data-toggle="collapse" aria-expanded="true" data-target="#itemThree">
                                        <span>Advanced Equipment and Best Dentists</span>
                                    </h6>
                                </div>
                                <div class="collapse" id="itemThree" data-parent="#accordionFaq">
                                    <div class="accordion-content">
                                        <p>
                                            Orem psum dolor sit amet consectetur adipiscing elit sed do eiusmod tempor incididunt ut labore ets dolore magna aliqua uispsum suspendisse
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section> --}}
    <!--====== FAQ Section End ======-->

@endsection