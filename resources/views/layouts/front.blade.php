<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>@yield('title') | {{ $appSetting->website_name ?? config('app.name') }}</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="title" content="@yield('meta_title', $appSetting->meta_title ?? '')">
        <meta name="keywords" content="@yield('meta_keywords', $appSetting->meta_keywords ?? '')">
        <meta name="description" content="@yield('meta_description', $appSetting->meta_description ?? '')">
        <meta name="author" content="{{ $appSetting->website_name ?? 'FertilityCare' }}">
        <link rel="canonical" href="{{ url()->current() }}">

        <meta property="og:type" content="website">
        <meta property="og:url" content="{{ url()->current() }}">
        <meta property="og:title" content="@yield('meta_title', $appSetting->meta_title ?? '')">
        <meta property="og:description" content="@yield('meta_description', $appSetting->meta_description ?? '')">
        <meta property="og:image" content="{{ asset($appSetting->logo ?? 'assets/front/img/logo.png') }}">
        <meta property="og:site_name" content="{{ $appSetting->website_name ?? config('app.name') }}">

        <meta name="twitter:card" content="summary_large_image">
        <meta name="twitter:url" content="{{ url()->current() }}">
        <meta name="twitter:title" content="@yield('meta_title', $appSetting->meta_title ?? '')">
        <meta name="twitter:description" content="@yield('meta_description', $appSetting->meta_description ?? '')">
        <meta name="twitter:image" content="{{ asset($appSetting->logo ?? 'assets/front/img/logo.png') }}">

        <script type="application/ld+json">
        {
            "@context": "https://schema.org",
            "@type": "MedicalWebPage",
            "name": "{{ $appSetting->website_name ?? config('app.name') }}",
            "url": "{{ $appSetting->website_url ?? url('/') }}",
            "description": "{{ $appSetting->meta_description ?? '' }}",
            "image": "{{ asset($appSetting->logo ?? 'assets/front/img/logo.png') }}"
        }
        </script>

        @if($appSetting->google_analytics ?? false)
        <script async src="https://www.googletagmanager.com/gtag/js?id={{ $appSetting->google_analytics }}"></script>
        <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());
        gtag('config', '{{ $appSetting->google_analytics }}');
        </script>
        @endif

        {!! $appSetting->header_scripts ?? '' !!}

        <!--====== Favicon Icon ======-->
        <link rel="shortcut icon" href="{{ asset($appSetting->favicon) }}" type="img/png" />
        <!--====== Animate Css ======-->
        <link rel="stylesheet" href="{{ asset('assets/front/css/animate.min.css') }}" />
        <!--====== Bootstrap css ======-->
        <link rel="stylesheet" href="{{ asset('assets/front/css/bootstrap.min.css') }}" />
        <!--====== Slick Slider ======-->
        <link rel="stylesheet" href="{{ asset('assets/front/css/slick.min.css') }}" />
        <!--====== Nice Select ======-->
        <link rel="stylesheet" href="{{ asset('assets/front/css/nice-select.min.css') }}" />
        <!--====== Magnific Popup ======-->
        <link rel="stylesheet" href="{{ asset('assets/front/css/magnific-popup.min.css') }}" />
        <!--====== Font Awesome ======-->
        <link rel="stylesheet" href="{{ asset('assets/front/fonts/fontawesome/css/all.min.css') }}" />
        <!--====== Flaticon ======-->
        <link rel="stylesheet" href="{{ asset('assets/front/fonts/flaticon/css/flaticon.css') }}" />
        <!--====== Main Css ======-->
        <link rel="stylesheet" href="{{ asset('assets/front/css/style.css') }}" />

        <script src="https://cdn.ckeditor.com/ckeditor5/39.0.1/classic/ckeditor.js"></script>

    @livewireStyles
    </head>

    <body> 

        <!--====== Start Preloader ======-->
        <div id="preloader">
            <div id="loading-center">
                <div id="object"></div>
            </div>
        </div>
        <!--====== End Preloader ======-->
            
            @include('layouts.inc.frontend.navbar')

            {{-- @include('layouts.inc.frontend.searchbar') --}}

            @yield('content')

        <!--====== Back to Top Start ======-->
        <a class="back-to-top" href="#">
            <i class="far fa-angle-up"></i>
        </a>
        <!--====== Back to Top End ======-->

        <!--====== Start Template Footer ======-->
        <footer class="template-footer have-cta-boxed-one">
            <div class="cta-boxed-one">
                <div class="container">
                    <div class="cta-inner bg-color-secondary bg-size-cover blend-mode-multiply" style="background-image: url({{ asset   ('assets/front/img/cta-img/cta-boxed-bg-1.jpg') }});">
                        <div class="row justify-content-center">
                            <div class="col-xl-6 col-lg-8 col-md-10">
                                <div class="cta-content text-center">
                                    <div class="section-heading heading-white">
                                        <span class="tagline">Get Free Consultations</span>
                                        <h2 class="title">Looking a Specialist to Get Your Services</h2>
                                    </div>
                                    <ul class="cta-buttons d-flex justify-content-center flex-wrap">
                                        <li><a href="{{ url('contact') }}" class="template-btn template-btn-white">Contact Us <i class="far fa-plus"></i></a></li>
                                        <li><a href="{{ url('appointment') }}" class="template-btn template-btn-bordered">Book Appointment <i class="far fa-plus"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="footer-inner bg-color-grey">
                <div class="container">
                    <div class="footer-widgets">
                        <div class="row">
                            <div class="col-lg-3 col-md-8">
                                <div class="widget text-widget">
                                    <div class="footer-logo">
                                        <img src="{{ asset($appSetting->footerlogo) }}" alt="Medibo">
                                    </div>
                                    <p>
                                        Providing compassionate fertility care, advanced treatments, and unwavering support on your journey to parenthood. Your dreams, our commitment.
                                    </p>
                                    <ul class="contact-list">
                                        <li>
                                            <a><i class="far fa-map-marker-alt"></i>{{ $appSetting->address }}</a>
                                        </li>
                                        <li>
                                            <a href="mailto:{{ $appSetting->email }}"><i class="far fa-envelope"></i>{{ $appSetting->email }}</a>
                                        </li>
                                        <li>
                                            <a href="tel:{{ $appSetting->phone }}"><i class="far fa-phone"></i>{{ $appSetting->phone }}</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="row">
                                    <div class="col-xl-5 col-md-6">
                                        <div class="widget nav-widget">
                                            <h4 class="widget-title">Quick Link</h4>
                                            <ul class="nav-links">
                                                <li><a href="{{ url('/about') }}">About Us</a></li>
                                                <li><a href="{{ url('contact') }}">Contact</a></li>
                                                <li><a href="{{ ('/testimonials') }}">Testimonials</a></li>
                                                <li><a href="{{ url('/appointment') }}">Appointment</a></li>
                                                
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="col-xl-7 col-md-6">
                                        <div class="widget instagram-widget">
                                            <h4 class="widget-title">Photo Gallery</h4>
                                            <div class="instagram-images">
                                                <div class="single-image">
                                                    <img src="{{ asset('assets/front/img/instagram/01.jpg') }}" alt="Instagram">
                                                    <a href="#"><i class="fab fa-instagram"></i></a>
                                                </div>
                                                <div class="single-image">
                                                    <img src="{{ asset('assets/front/img/instagram/02.jpg') }}" alt="Instagram">
                                                    <a href="#"><i class="fab fa-instagram"></i></a>
                                                </div>
                                                <div class="single-image">
                                                    <img src="{{ asset('assets/front/img/instagram/03.jpg') }}" alt="Instagram">
                                                    <a href="#"><i class="fab fa-instagram"></i></a>
                                                </div>
                                                <div class="single-image">
                                                    <img src="{{ asset('assets/front/img/instagram/04.jpg') }}" alt="Instagram">
                                                    <a href="#"><i class="fab fa-instagram"></i></a>
                                                </div>
                                                <div class="single-image">
                                                    <img src="{{ asset('assets/front/img/instagram/05.png') }}" alt="Instagram">
                                                    <a href="#"><i class="fab fa-instagram"></i></a>
                                                </div>
                                                <div class="single-image">
                                                    <img src="{{ asset('assets/front/img/instagram/05.png') }}" alt="Instagram">
                                                    <a href="#"><i class="fab fa-instagram"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-10">
                                <div class="widget newsletters-widget">
                                    <h4 class="widget-title">Newsletters</h4>
                                    <p>
                                        You’re receiving this newsletter as part of our commitment to keeping you informed on fertility care, wellness, and family-building resources.
                                    </p>
                                    <form action="{{ url('sub') }}" method="post" class="newsletters-form">
                                        @csrf
                                        <input type="email" placeholder="Email Address" name="subemail">
                                        @error('subemail')
                                            <div class="alert alert-danger">{{ $message }}</div>  
                                        @enderror
                                        <button type="submit"><i class="far fa-arrow-right"></i></button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="copyright-area">
                        <p>© 2025 <a href="#">{{ $appSetting->website_name }}</a>. All Rights Reserved</p>
                    </div>
                </div>
            </div>
        </footer>
        <!--====== End Template Footer ======-->

        <!-- Footer Start -->
        {{-- <div class="container-fluid footer py-5 wow fadeIn" data-wow-delay="0.2s">
            <div class="container py-5">
                <div class="row g-5">
                    <div class="col-md-6 col-lg-6 col-xl-3">
                        <div class="footer-item d-flex flex-column">
                            <div class="footer-item">
                                <h4 class="text-white mb-4">Newsletter</h4>
                                <p class="mb-3">Get notified about new features & updates, news about latest community projects & events, new jobs oppurtunities and all our new products & discounts.</p>
                                <form action="{{ url('sub') }}" method="POST">
                                    @csrf
                                    <div class="position-relative mx-auto rounded-pill">
                                        <input class="form-control rounded-pill w-100 py-3 ps-4 pe-5" name="subemail" type="text" placeholder="Enter your email">
                                        @error('subemail')
                                            <div class="alert alert-danger">{{ $message }}</div>  
                                        @enderror
                                        <button type="submit" class="btn btn-primary rounded-pill position-absolute top-0 end-0 py-2 mt-2 me-2">SignUp</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-6 col-xl-3">
                        <div class="footer-item d-flex flex-column">
                            <h4 class="text-white mb-4">Explore</h4>
                            <a href="{{ url('/') }}"><i class="fas fa-angle-right me-2"></i> Home</a>
                            <a href="#"><i class="fas fa-angle-right me-2"></i> Services</a>
                            <a href="{{ url('about') }}"><i class="fas fa-angle-right me-2"></i> About Us</a>
                            <a href="{{ url('offers') }}"><i class="fas fa-angle-right me-2"></i> Offers</a>
                            
                            <a href="{{ url('jobs') }}"><i class="fas fa-angle-right me-2"></i> Jobs</a>
                            <a href="{{ url('contact') }}"><i class="fas fa-angle-right me-2"></i> Contact Us</a>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-6 col-xl-3">
                        <div class="footer-item d-flex flex-column">
                            <h4 class="text-white mb-4">Contact Info</h4>
                            <a href=""><i class="fa fa-map-marker-alt me-2"></i> {{ $appSetting->address }}</a>
                            <a href=""><i class="fas fa-envelope me-2"></i> {{ $appSetting->email }}</a>
                            <a href=""><i class="fas fa-envelope me-2"></i> {{ $appSetting->email2 }}</a>
                            <a href=""><i class="fas fa-phone me-2"></i> {{ $appSetting->phone }}</a>
                            <a href="" class="mb-3"><i class="fas fa-print me-2"></i> {{ $appSetting->phone2 }}</a>
                            <div class="d-flex align-items-center">
                                <a class="btn btn-light btn-md-square me-2" href="{{ $appSetting->facebook }}"><i class="fab fa-facebook-f"></i></a>
                                <a class="btn btn-light btn-md-square me-2" href="{{ $appSetting->twitter }}"><i class="fab fa-twitter"></i></a>
                                <a class="btn btn-light btn-md-square me-2" href="{{ $appSetting->instagram }}"><i class="fab fa-instagram"></i></a>
                                <a class="btn btn-light btn-md-square me-0" href="{{ $appSetting->linkedin }}"><i class="fab fa-linkedin-in"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-6 col-xl-3">
                        <div class="footer-item-post d-flex flex-column">
                            <h4 class="text-white mb-4">Reg Info</h4>
                            <div class="d-flex flex-column mb-3">
                                
                                <a href="#" class="text-body">NO. PENDAFTARAN: 202203298014 (LA0052459-A)</a>
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div> --}}
        <!-- Footer End -->

        
        <!-- Copyright Start -->
        {{-- <div class="container-fluid copyright py-4">
            <div class="container">
                <div class="row g-4 align-items-center">
                    <div class="col-md-6 text-center text-md-start mb-md-0">
                        <span class="text-body"><i class="fas fa-copyright text-light me-2"></i> 2024 {{ $appSetting->website_name }}, All right reserved.</span>
                    </div>
                    
                </div>
            </div>
        </div> --}}
        <!-- Copyright End -->

        <!--====== Jquery ======-->
        <script src="{{ asset('assets/front/js/jquery-3.6.0.min.js') }}"></script>
        <!--====== Bootstrap ======-->
        <script src="{{ asset('assets/front/js/bootstrap.min.js') }}"></script>
        <!--====== Slick slider ======-->
        <script src="{{ asset('assets/front/js/slick.min.js') }}"></script>
        <!--====== Isotope ======-->
        <script src="{{ asset('assets/front/js/isotope.pkgd.min.js') }}"></script>
        <!--====== Images loaded ======-->
        <script src="{{ asset('assets/front/js/imagesloaded.pkgd.min.js') }}"></script>
        <!--====== In-view ======-->
        <script src="{{ asset('assets/front/js/jquery.inview.min.js') }}"></script>
        <!--====== Nice Select ======-->
        <script src="{{ asset('assets/front/js/jquery.nice-select.min.js') }}"></script>
        <!--====== Magnific Popup ======-->
        <script src="{{ asset('assets/front/js/magnific-popup.min.js') }}"></script>
        <!--====== WOW Js ======-->
        <script src="{{ asset('assets/front/js/wow.min.js') }}"></script>
        <!--====== Main JS ======-->
        <script src="{{ asset('assets/front/js/main.js') }}"></script>

        <script>
    ClassicEditor
    .create( document.querySelector( '#reason' ) )
    .then( editor => {
        editor.ui.view.editable.element.style.height = '200px';
    } )
    .catch( error => {
    console.error( error );
    });
  </script>
        

    @livewireScripts

    {!! $appSetting->footer_scripts ?? '' !!}
    </body>

</html>