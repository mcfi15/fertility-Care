<!--====== Start Template Header ======-->
   <header class="template-header sticky-header sticky-header header-five">
        <div class="header-top-list-two d-none d-lg-block">
            <div class="container container-1300">
                <div class="list-items">
                    <div class="single-list-item">
                        <div class="contact-info">
                            <div class="icon">
                                <img src="{{ asset('uploads/image/clock.png') }}"  alt="Icon">
                            </div>
                            <div class="content">
                                <span class="info-title">Opening Hour</span>
                                <a class="info-desc">{{ $appSetting->opening_hours ?? 'Sun - Friday, 08 am - 09 pm' }}</a>
                            </div>
                        </div>
                    </div>
                    <div class="single-list-item">
                        <div class="contact-info">
                            <div class="icon">
                                <i class="far fa-envelope" style="font-size: 50px;color:#21cdc0;"></i>
                            </div>
                            <div class="content">
                                <span class="info-title">Medical Address</span>
                                <a href="mailto:{{ $appSetting->email }}" class="info-desc">{{ $appSetting->email }}</a>
                            </div>
                        </div>
                    </div>
                    <div class="single-list-item">
                        <div class="contact-info">
                            <div class="icon">
                                <img src="{{ asset('uploads/image/phone.png') }}" alt="Icon">
                            </div>
                            <div class="content">
                                <span class="info-title">Phone Number</span>
                                <a href="tel:{{ $appSetting->phone }}" class="info-desc">{{ $appSetting->phone }}</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container container-1600">
            <div class="header-navigation">
                <div class="header-left">
                    <div class="site-logo">
                        <a href="{{ url('/') }}">
                            <img src="{{ asset($appSetting->logo) }}" alt="" style="height: 90px;">
                        </a>
                    </div>
                </div>
                <div class="header-center ml-xl-0 ml-auto">
                    <nav class="site-menu item-extra-gap d-none d-xl-block">
                        <ul class="primary-menu">
                            <li class="active">
                                <a href="{{ url('/') }}">Home</a>
                            </li>
                            
                            <li><a href="{{ url('/about') }}">About</a></li>

                            <li> 
                                <a href="#">All Categories</a>
                                <ul class="sub-menu">
                                    @foreach ($appCategories as $cat)
                                    <li>
                                        <a>{{ $cat->name }}</a>
                                        <ul class="sub-menu">
                                            @forelse($cat->products as $product)
                                            <li><a href="{{ url($product->category->slug.'/'. $product->slug) }}">{{ $product->title }}</a></li>
                                            @empty
                                                <li><span class=" text-muted">No Data Found</span></li>
                                            @endforelse
                                            
                                        </ul>
                                        @endforeach
                                    </li>
                                    
                                </ul>
                            </li>
                            <li><a href="{{ url('/testimonials') }}">Testimonials</a></li>
                            
                            {{-- @foreach ($appCategories as $cat)
                            <li>
                                <a>{{ $cat->name }}</a>
                                <ul class="sub-menu">
                                    @forelse($cat->products as $product)
                                        <li><a href="{{ $product->slug }}">{{ $product->title }}</a></li>
                                    @empty
                                        <li><span class=" text-muted">No Data Found</span></li>
                                    @endforelse
                                    
                                </ul>
                            </li>
                            @endforeach --}}
                            
                            <li><a href="{{ url('/contact') }}">Contact</a></li>
                        </ul>
                    </nav>
                    <ul class="extra-icons">
                        
                        
                        <li class="d-xl-none">
                            <a href="#" class="navbar-toggler">
                                <span></span>
                                <span></span>
                                <span></span>
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="header-right d-none d-lg-flex">
                    <ul class="extra-icons">
                        <li>
                            <a href="{{ url('/appointment') }}" class="template-btn template-btn-tertiary">Book Appointment <i class="far fa-plus"></i></a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <!-- Start Mobile Panel -->
        <div class="slide-panel mobile-slide-panel">
            <div class="panel-overlay"></div>
            <div class="panel-inner">
                <div class="panel-logo">
                    <img src="assets/img/logo-3.html" alt="">
                </div>
                <nav class="mobile-menu">
                    <ul class="primary-menu">
                        <li class="active">
                            <a href="index.html">Home</a>
                            <ul class="sub-menu">
                                <li><a href="index.html">Home One</a></li>
                                <li><a href="index-two.html">Home Two</a></li>
                                <li><a href="index-three.html">Home Three</a></li>
                                <li><a href="index-four.html">Home Four</a></li>
                                <li><a href="index-five.html">Home Five</a></li>
                            </ul>
                        </li>
                        <li><a href="about.html">About</a></li>
                        <li>
                            <a href="#">Pages</a>
                            <ul class="sub-menu">
                                <li>
                                    <a href="service.html">Services</a>
                                    <ul class="sub-menu">
                                        <li><a href="service.html">Service One</a></li>
                                        <li><a href="service-two.html">Service Two</a></li>
                                        <li><a href="service-details.html">Service Details</a></li>
                                    </ul>
                                </li>
                                <li><a href="pricing.html">Pricing Plan</a></li>
                                <li><a href="faq.html">Help & FAQ</a></li>
                                <li><a href="gallery.html">Our Gallery</a></li>
                                <li><a href="appointments.html">Appointment</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="doctors.html">Doctors</a>
                            <ul class="sub-menu">
                                <li><a href="doctor-details.html">Doctor Details</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="blog-standard.html">Blog</a>
                            <ul class="sub-menu">
                                <li><a href="blog-details.html">Blog Details</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="shop.html">Shop</a>
                            <ul class="sub-menu">
                                <li><a href="product-details.html">Shop Details</a></li>
                            </ul>
                        </li>
                        <li><a href="contact.html">Contact</a></li>
                    </ul>
                </nav>
                <a href="#" class="panel-close">
                    <i class="fal fa-times"></i>
                </a>
            </div>
        </div>
        <!-- Start Mobile Panel -->
    </header>
    <!--====== End Template Header ======-->