@extends('layouts.front')

@section('title', $product->title.' | Place Order')

@section('meta_title', $product->meta_title)

@section('meta_description', $product->meta_description)

@section('meta_keywords', $product->meta_keywords)

@section('content')

<!-- Header Start -->
<div class="container-fluid bg-breadcrumb">
    <div class="container text-center py-5" style="max-width: 900px;">
        <h4 class="text-white display-4 mb-4 wow fadeInDown" data-wow-delay="0.1s">Place Order</h4>
        <ol class="breadcrumb d-flex justify-content-center mb-0 wow fadeInDown" data-wow-delay="0.3s">
            <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
            <li class="breadcrumb-item active text-primary">{{ $product->title }}r</li>
        </ol>    
    </div>
</div>
<!-- Header End -->
</div>
<!-- Navbar & Hero End -->

@include('layouts.inc.frontend.searchbar')

<!-- Contact Start -->
<div class="container-fluid contact bg-light py-5">
    <div class="container py-5">
        <div class="row g-5 justify-content-center">
            <div class="col-lg-6 h-100 wow fadeInUp" data-wow-delay="0.2s">
                <div class="text-center mx-auto pb-5" style="max-width: 800px;">
                    <h4 class="text-uppercase text-primary">Place Your Order Here</h4>
                </div>
                @include('layouts.alert.msg')
                <form action="{{ url('place-order') }}" method="POST">
                    @csrf
                    <div class="row g-4">
                        <div class="col-lg-12 col-xl-6">
                            <div class="form-floating">
                                <input type="text" name="name" class="form-control border-0" id="name" placeholder="Your Name">
                                <label for="name">Your Name</label>
                            </div>
                            @error('name')
                                    <small class="text-danger">{{ $message }}</small>  
                                @enderror
                        </div>
                        <div class="col-lg-12 col-xl-6">
                            <div class="form-floating">
                                <input type="text" name="email" class="form-control border-0" id="email" placeholder="Your Email">
                                <label for="email">Your Email</label>
                            </div>
                            @error('email')
                                    <small class="text-danger">{{ $message }}</small>  
                                @enderror
                        </div>
                        <div class="col-lg-12 col-xl-6">
                            <div class="form-floating">
                                <input type="phone" name="phone" class="form-control border-0" id="phone" placeholder="Phone">
                                <label for="phone">Your Phone</label>
                                
                            </div>
                            @error('phone')
                                    <small class="text-danger">{{ $message }}</small>  
                                @enderror
                        </div>
                        <div class="col-lg-12 col-xl-6">
                            <div class="form-floating">
                                <input type="number" name="quantity" class="form-control border-0" id="quantity" placeholder="Quantity">
                                <label for="quantity">Quantity</label>
                            </div>
                            @error('quantity')
                                    <small class="text-danger">{{ $message }}</small>  
                                @enderror
                        </div>
                        <div class="col-lg-12 col-xl-6">
                            <div class="form-floating">
                                <input type="text"  name="product_code" class="form-control border-0" id="product_code" value="{{ $product->product_code }}" readonly>
                                <label for="product_code">Product ID</label>
                            </div>
                            @error('product_code')
                                    <small class="text-danger">{{ $message }}</small>  
                                @enderror
                        </div>
                        <div class="col-lg-12 col-xl-6">
                            <div class="form-floating">
                                <input type="text"  name="price" class="form-control border-0" id="price" value="{{ $product->price }}" readonly>
                                <label for="price">Price (&#x52;)</label>
                            </div>
                            @error('price')
                                    <small class="text-danger">{{ $message }}</small>  
                                @enderror
                        </div>
                        <div class="col-lg-12 col-xl-12">
                            <div class="form-floating">
                                <input type="text"  name="title" class="form-control border-0" id="title" value="{{ $product->title }}" readonly>
                                <label for="title">Product Name</label>
                            </div>
                            @error('title')
                                    <small class="text-danger">{{ $message }}</small>  
                                @enderror
                        </div>
            
                        <div class="col-12">
                            <button type="submit" class="btn btn-primary w-100 py-3">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
            
        </div>
    </div>
</div>
<!-- Contact End -->

{{-- <div>
    <livewire:frontend.product.order :category="$category" :product="$product" />
</div> --}}

@endsection