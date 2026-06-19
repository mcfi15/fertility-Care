@extends('layouts.front')

@section('title', 'Contact page')

@section('meta_title', $appSetting->meta_title)

@section('meta_description', $appSetting->meta_description)

@section('meta_keywords', $appSetting->meta_keywords)

@section('content')

<!--====== Page Title Start ======-->
    <section class="page-title-area page-title-bg" style="background-image: url(assets/img/section-bg/page-title.html);">
        <div class="container">
            <h1 class="page-title">Contact Us</h1>

            <ul class="breadcrumb-nav">
                <li><a href="#">Home</a></li>
                <li><i class="fas fa-angle-right"></i></li>
                <li>Contact Us</li>
            </ul>
        </div>
    </section>
    <!--====== Page Title End ======-->

    <!--====== Contact Info Section Start ======-->
    <section class="section-gap contact-top-wrappper">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-5 col-lg-6 col-md-10">
                    <div class="contact-info-wrapper">
                        <div class="single-contact-info">
                            <div class="single-contact-info">
                                <h3 class="info-title">
                                    <i class="fal fa-map-marker-alt"></i> Address
                                </h3>
                                <p>
                                    {{$appSetting->address}}
                                </p>
                            </div>
                            <div class="single-contact-info">
                                <h3 class="info-title">
                                    <i class="fal fa-coffee"></i> Get In Touch
                                </h3>
                                <ul>
                                    <li>
                                        <span>Phone Number</span><a href="tel:{{ $appSetting->phone }}">{{ $appSetting->phone }}</a>
                                    </li>
                                    <li>
                                        <span>Email Address</span><a href="mailto:{{ $appSetting->email }}">{{ $appSetting->email }}</a>
                                    </li>
                                    <li>
                                        <span>Hotline</span><a href="tel:{{ $appSetting->phone2 }}">{{ $appSetting->phone2 }}</a>
                                    </li>
                                </ul>
                            </div>
                            <div class="single-contact-info">
                                <h3 class="info-title">
                                    <i class="fal fa-comments"></i> Follow Us
                                </h3>
                                <p>
                                    Follow us on social media for the latest updates, news, and special offers.
                                </p>
                                <p class="social-icon">
                                    <a href="{{ $appSetting->facebook }}"><i class="fab fa-facebook"></i></a>
                                    <a href="{{ $appSetting->twitter }}"><i class="fab fa-twitter-square"></i></a>
                                    <a href="{{ $appSetting->linkedin }}"><i class="fab fa-linkedin"></i></a>
                                    <a href="{{ $appSetting->instagram }}"><i class="fab fa-instagram"></i></a>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-5 col-lg-6 col-md-10">
                    <div class="working-hour-chart">
                        <h2 class="chart-title">Working Hour</h2>
                        <ul>
                            <li>
                                <span><i class="far fa-angle-right"></i>Monday</span>
                                <span>9:00-19:00</span>
                            </li>
                            <li>
                                <span><i class="far fa-angle-right"></i>Tuesday</span>
                                <span>9:00-19:00</span>
                            </li>
                            <li>
                                <span><i class="far fa-angle-right"></i>Wednesday</span>
                                <span>9:00-19:00</span>
                            </li>
                            <li>
                                <span><i class="far fa-angle-right"></i>Thursday</span>
                                <span>9:00-19:00</span>
                            </li>
                            <li>
                                <span><i class="far fa-angle-right"></i>Friday</span>
                                <span>9:00-19:00</span>
                            </li>
                            <li>
                                <span><i class="far fa-angle-right"></i>Saturday</span>
                                <span>9:00-19:00</span>
                            </li>
                            <li>
                                <span><i class="far fa-angle-right"></i>Sunday</span>
                                <span>9:00-19:00</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--====== Contact Info Section End ======-->

    <!--====== Contact Form Start ======-->
    <section class="contact-form-area">
        <div class="contact-map">
            <iframe
                src="https://www.google.com/maps?q={{ $appSetting->latitude }},{{ $appSetting->longitude }}&z={{ $zoom ?? 14 }}&output=embed"
                style="border:0;"
                allowfullscreen
                loading="lazy"
                referrerpolicy="no-referrer-when-downgrade">
            </iframe>
        </div>

        <div class="section-gap">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-10">
                        <div class="section-heading mb-60 text-center">
                            <span class="tagline">We're Ready To Help You</span>
                            <h2 class="title">Leave a Message</h2>
                        </div>
                        @include('layouts.alert.msg')
                        <form action="post-message" method="post">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="input-field">
                                        <label for="name">Your Full Name</label>
                                        <input type="text" name="name" placeholder="Michael M. Smith" id="name">
                                        @error('name')
                                            <div class="alert alert-danger">{{ $message }}</div>  
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="input-field">
                                        <label for="email">Email Address</label>
                                        <input type="email" name="email" placeholder="support@gmail.com" id="email">
                                        @error('email')
                                            <div class="alert alert-danger">{{ $message }}</div>  
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="input-field">
                                        <label for="subject">Subject</label>
                                        <input type="text" placeholder="Subject" id="subject">
                                        @error('subject')
                                            <div class="alert alert-danger">{{ $message }}</div>  
                                        @enderror
                                    </div>
                                </div>
                                
                                <div class="col-lg-12">
                                    <div class="input-field">
                                        <label for="message">Write Message</label>
                                        <textarea name="message" id="message" placeholder="Write Message...."></textarea>
                                        @error('message')
                                            <div class="alert alert-danger">{{ $message }}</div>  
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="text-center">
                                        <button class="template-btn" type="submit">Send Us Message <i class="far fa-plus"></i></button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--====== Contact Form End ======-->


@endsection