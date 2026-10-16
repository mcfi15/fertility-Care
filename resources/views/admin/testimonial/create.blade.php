@extends('layouts.admin')

@section('title', 'New testimonial')

@section('content')
  <div class="container">
    <div class="page-inner">
      <div class="page-header">
        <h3 class="fw-bold mb-1">New testimonial</h3>
        <ul class="breadcrumbs mb-0">
          <li class="nav-home"><a href="{{ url('admin/dashboard') }}"><i class="icon-home"></i></a></li>
          <li class="separator"><i class="icon-arrow-right"></i></li>
          <li class="nav-item"><a href="{{ route('admin.testimonials.index') }}">Testimonials</a></li>
          <li class="separator"><i class="icon-arrow-right"></i></li>
          <li class="nav-item"><a href="#">New</a></li>
        </ul>
      </div>

      @include('layouts.alert.msg')
      @if ($errors->any())
        <div class="alert alert-danger">Please correct the highlighted fields.</div>
      @endif

      @include('admin.testimonial.form', ['action' => route('admin.testimonials.store'), 'method' => 'POST'])
    </div>
  </div>
@endsection
