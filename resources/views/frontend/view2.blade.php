@extends('layouts.front')

@section('title', $product->title.' | Single View')

@section('meta_title', $product->meta_title)

@section('meta_description', $product->meta_description)

@section('meta_keywords', $product->meta_keywords)

@section('content')

 <!--====== Page Title Start ======-->
    <section class="page-title-area">
        <div class="container">
            <h1 class="page-title">{{ $product->title }}</h1>

            <ul class="breadcrumb-nav">
                <li><a href="#">Home</a></li>
                <li><i class="fas fa-angle-right"></i></li>
                <li>{{ $product->title }}</li>
            </ul>
        </div>
    </section>
    <!--====== Page Title End ======-->

    <!--====== Blog Standard Start ======-->
    <section class="blog-area section-gap">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="blog-details-wrapper">
                        
                        <div class="blog-details-inner">
                            <div class="post-content">
                                
                                <h3 class="post-title">
                                    <a href="blog-details.html">{{ $product->title }}</a>
                                </h3>
                                <p>
                                    {{ $product->description }}
                                </p>
                                
                            </div>
                            
                            
                            
                            
                            
                        </div>
                    </div>
                </div>
                {{-- <div class="col-lg-4">
                    <div class="primary-sidebar">
                        <div class="widget search-widget">
                            <h4 class="widget-title">Book Appointment</h4>
                           
                                
                                <button type="submit"><i class="far fa-search"></i></button>
                            </form>
                        </div>
                        <div class="widget category-widget">
                            <h4 class="widget-title">Category</h4>
                            <ul>
                                <li><a href="#">Business (5)</a></li>
                                <li><a href="#">Dental Care (15)</a></li>
                                <li><a href="#">Eye Care (11)</a></li>
                                <li><a href="#">Allergic Issue (6)</a></li>
                                <li><a href="#">Cardiology (9)</a></li>
                                <li><a href="#">Neurology Surgery (8)</a></li>
                                <li><a href="#">Allergic Issue (09)</a></li>
                            </ul>
                        </div>
                        <div class="widget latest-post-widget">
                            <h4 class="widget-title">Latest News</h4>
                            <div class="latest-post-loop">
                                <div class="single-post">
                                    <div class="thumbnail">
                                        <img src="assets/img/blog/post-widget-1.html" alt="Image">
                                    </div>
                                    <div class="content">
                                        <h6><a href="blog-details.html">Build Seamless Spreadsheet Import Experience</a></h6>
                                        <span class="date"><i class="far fa-calendar-alt"></i> 25 May 2021</span>
                                    </div>
                                </div>
                                <div class="single-post">
                                    <div class="thumbnail">
                                        <img src="assets/img/blog/post-widget-2.html" alt="Image">
                                    </div>
                                    <div class="content">
                                        <h6><a href="blog-details.html">Creating Online Environment Work Well Older</a></h6>
                                        <span class="date"><i class="far fa-calendar-alt"></i> 25 May 2021</span>
                                    </div>
                                </div>
                                <div class="single-post">
                                    <div class="thumbnail">
                                        <img src="assets/img/blog/post-widget-3.html" alt="Image">
                                    </div>
                                    <div class="content">
                                        <h6><a href="blog-details.html">Signs Website Feels More Haunted House</a></h6>
                                        <span class="date"><i class="far fa-calendar-alt"></i> 25 May 2021</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="widget cta-widget">
                            <div class="cta-content" style="background-image: url(assets/img/blog/cta-widget.html);">
                                <h4 class="cta-title">Get Free  Consultations</h4>
                                <span class="cta-tagline">Special advisors</span>
                                <p>Quis autem vel eum iure repreh ende</p>
                                <a href="#" class="cta-btn">Get a quote</a>
                            </div>
                        </div>
                        <div class="widget tag-cloud-widget">
                            <h4 class="widget-title">Popular Tags</h4>
                            <ul>
                                <li><a href="#">Medical</a></li>
                                <li><a href="#">Doctors</a></li>
                                <li><a href="#">Nurses</a></li>
                                <li><a href="#">Consultancy</a></li>
                                <li><a href="#">Law farms</a></li>
                                <li><a href="#">Farms</a></li>
                                <li><a href="#">Management</a></li>
                                <li><a href="#">Planning</a></li>
                            </ul>
                        </div>
                    </div>
                </div> --}}
            </div>
        </div>
    </section>
    <!--====== Blog Standard End ======-->

{{-- <!-- Header Start -->
<div class="container-fluid bg-breadcrumb">
    <div class="container text-center py-5" style="max-width: 900px;">
        <h4 class="text-white display-4 mb-4 wow fadeInDown" data-wow-delay="0.1s">{{ $product->title }}</h4>
        <ol class="breadcrumb d-flex justify-content-center mb-0 wow fadeInDown" data-wow-delay="0.3s">
            <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
            <li class="breadcrumb-item active text-primary">{{ $product->title }}</li>
        </ol>    
    </div>
</div>
<!-- Header End -->
</div>
<!-- Navbar & Hero End -->

@include('layouts.inc.frontend.searchbar')

<div>
    <livewire:frontend.product.view :category="$category" :product="$product" />
</div> --}}

@endsection