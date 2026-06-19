@extends('layouts.front')

@section('title', $category->name)

@section('meta_title', $appSetting->meta_title)

@section('meta_description', $appSetting->meta_description)

@section('meta_keywords', $appSetting->meta_keywords)


{{-- @section('meta_keywords')
    {{ $products->meta_keywords }}
@endsection

@section('meta_description')
    {{ $products->meta_description }}
@endsection --}}

@section('content')

<!-- Header Start -->
<div class="container-fluid bg-breadcrumb">
    <div class="container text-center py-5" style="max-width: 900px;">
        <h4 class="text-white display-4 mb-4 wow fadeInDown" data-wow-delay="0.1s">{{ $category->name }}</h4>
        <ol class="breadcrumb d-flex justify-content-center mb-0 wow fadeInDown" data-wow-delay="0.3s">
            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
            <li class="breadcrumb-item active text-primary">{{ $category->name }}</li>
        </ol>    
    </div>
</div>
<!-- Header End -->
</div>
<!-- Navbar & Hero End -->

@include('layouts.inc.frontend.searchbar')


<!-- Products Start -->
<div class="container-fluid product py-5">
    <div class="container py-5">
        {{-- <div class="text-center mx-auto pb-5 wow fadeInUp" data-wow-delay="0.2s" style="max-width: 800px;">
            <h4 class="text-uppercase text-primary">Our Products</h4>
            <h1 class="display-3 text-capitalize mb-3">We Deliver Best Quality Bottle Packs.</h1>
        </div> --}}
        <div class="row g-4 justify-content-center">

            @forelse($products as $product)
                <div class="col-lg-6 col-xl-4 wow fadeInUp" data-wow-delay="0.2s">
                    <div class="product-item">
                        <img src="{{ asset($product->image) }}" style="height:250px;" class="img-fluid w-100 rounded-top"  alt="Image">
                        <div class="product-content bg-light text-center rounded-bottom p-4">
                            {{-- <p>{{ $product->small_description }}</p> --}}
                            <a href="{{ url('product-view/'.$product->category->slug.'/'.$product->slug) }}" class="h4 d-inline-block mb-3">{{ $product->title }}</a>
                            <p class="fs-4 text-primary mb-3">&#x52;{{ number_format($product->price, 2) }}</p>
                            <a href="{{ url('product-view/'.$product->category->slug.'/'.$product->slug) }}" class="btn btn-secondary rounded-pill py-2 px-4">View Details</a>
                        </div>
                    </div>
                </div>
            @empty
                <center><h5><span style="color:red;">No Data Available</span></h5></center>
            @endforelse
           
        </div>

        {{ $products->links() }}
    </div>
</div>
<!-- Products End -->

@endsection