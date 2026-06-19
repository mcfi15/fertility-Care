@extends('layouts.front')

@section('title', $jobs->title)

@section('meta_title', $appSetting->meta_title)

@section('meta_description', $appSetting->meta_description)

@section('meta_keywords', $appSetting->meta_keywords) 

@section('content')

<!-- Header Start -->
<div class="container-fluid bg-breadcrumb">
    <div class="bg-breadcrumb-single"></div>
    <div class="container text-center py-5" style="max-width: 900px;">
        <h4 class="text-white display-4 mb-4 wow fadeInDown" data-wow-delay="0.1s">Job Description</h4>
        <ol class="breadcrumb justify-content-center mb-0 wow fadeInDown" data-wow-delay="0.3s">
            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
            <li class="breadcrumb-item active text-primary">Job Description</li>
        </ol>    
    </div>
</div>
<!-- Header End -->



<div class="py-3 py-md-5 ">
    <div class="container">
        <div class="row justify-content-center">
            
            <div class="col-md-9 mt-3">
                <div class="product-view">
                    <h4 class="product-name">
                        {{ $jobs->title }}
                        
                    </h4>
                    <hr>
                    <em>
                        Date Created: {{ $jobs->created_at }}
                    </em>
                    {{-- <h6>{{ $product->product_code }}</h6> --}}
                    {{-- <div>
                        <span class="selling-price">&#x52;{{ number_format($product->price, 2) }}</span>
                    </div> --}}
                    {{-- <div class="mt-2">
                        <div class="input-group">
                            <span class="btn btn1"><i class="fa fa-minus"></i></span>
                            <input type="text" value="1" class="input-quantity" />

                            <span class="btn btn1"><i class="fa fa-plus"></i></span>
                        </div>
                    </div> --}}
                    
                    <div class="mt-3">
                        
                        <p><strong>Location:</strong> <span><small>{{ $jobs->location }}</small></span></p>
                        <p><strong>Position:</strong> <span><small>{{ $jobs->position }}</small></span></p>
                        <p><strong>Eligibility Criteria:</strong> <span><small>{{ $jobs->eligibility }}</small></span></p>
                        <p><strong>Employment Type:</strong> <span><small>{{ $jobs->type }}</small></span></p>
                        <p><strong>Application Closing Date:</strong> <span><small>{{ $jobs->closing_date }}</small></span></p>
                        <h5 class="mb-0">Job Description</h5>
                        <p>
                            {!! $jobs->description !!}
                        </p>
                    </div>
                    <div class="mt-2">
                        {{-- <a href="" class="btn btn1"> <i class="fa fa-shopping-cart"></i> Add To Cart</a> --}}
                        @if ($jobs->status == '0')
                            <a href="{{ url('application/'.$jobs->slug) }}"  class="btn btn-primary rounded-pill d-inline-flex flex-shrink-0 py-2 px-4">Apply Now </a>
                        @else  
                        <p><strong>Application Closed</strong></p> 
                        @endif
                        
                    </div>
                </div>
            </div>
        </div>
        
        
    </div>
</div>

@endsection