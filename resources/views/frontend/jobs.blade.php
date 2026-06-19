@extends('layouts.front')

@section('title', 'Jobs')

@section('meta_title', $appSetting->meta_title)

@section('meta_description', $appSetting->meta_description)

@section('meta_keywords', $appSetting->meta_keywords)

@section('content')

<!-- Header Start -->
<div class="container-fluid bg-breadcrumb">
    <div class="bg-breadcrumb-single"></div>
    <div class="container text-center py-5" style="max-width: 900px;">
        <h4 class="text-white display-4 mb-4 wow fadeInDown" data-wow-delay="0.1s">Jobs</h4>
        <ol class="breadcrumb justify-content-center mb-0 wow fadeInDown" data-wow-delay="0.3s">
            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
            <li class="breadcrumb-item active text-primary">Jobs</li>
        </ol>    
    </div>
</div>
<!-- Header End -->

<div class="py-3 py-md-5 ">
    <div class="container">
        <div class="row justify-content-center">

            @forelse ($jobs as $job)
            <div class="col-md-7 mt-3 ">
                <div class="product-view ">
                    <h4 class="product-name">
                        {{ $job->title }}
                        
                    </h4>
                    <hr>
                    <p class="product-path">
                        Posted Date: {{ $job->created_at }}
                    </p>
                    
                    
                    
                    <div class="mt-2">
                        
                        <a href="{{ url('view/'.$job->slug) }}"  class="btn btn-primary rounded-pill d-inline-flex flex-shrink-0 py-2 px-4">View Job Details </a>
                    </div>
                    <div class="mt-3">
                        <p>
                            {{ $job->small_description }}
                        </p>
                    </div>
                </div>
                <hr>
            </div>
            @empty
                <center><h4> <span style="color:red;">No Jobs Available</span></h4></center>
            @endforelse
            
            
           
        </div>
        
        {{ $jobs->links() }}
    </div>
</div>




@endsection