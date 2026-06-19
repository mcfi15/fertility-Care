@extends('layouts.admin')

@section('title', 'Admin Dashboard')

@section('content')

<div class="container">
    <div class="page-inner">
      <!-- Card -->
      <h3 class="fw-bold mb-3">Dashboard</h3>
      @include('layouts.alert.msg')
      <div class="row">
        <div class="col-md-4">
          <div class="card card-secondary">
            <div class="card-body skew-shadow">
              <h1>{{ $allapp }}</h1>
              <h5 class="op-8">Applications</h5>
              <div class="pull-right">
                <h3 class="fw-bold op-8"></h3>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card card-secondary bg-secondary-gradient">
            <div class="card-body bubble-shadow">
              <h1>{{ $alljobs }}</h1>
              <h5 class="op-8">Jobs</h5>
              <div class="pull-right">
                <h3 class="fw-bold op-8"></h3>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card card-secondary bg-secondary-gradient">
            <div class="card-body curves-shadow">
              <h1>{{ $alloffers }}</h1>
              <h5 class="op-8">Offers</h5>
              <div class="pull-right">
                <h3 class="fw-bold op-8"></h3>
              </div>
            </div>
          </div>
        </div>
      </div>


      <div class="row">
        {{-- <div class="col-md-4">
          <div class="card card-secondary">
            <div class="card-body skew-shadow">
              <h1>{{ $allcategories }}</h1>
              <h5 class="op-8">Categories</h5>
              <div class="pull-right">
                <h3 class="fw-bold op-8"></h3>
              </div>
            </div>
          </div>
        </div> --}}
        <div class="col-md-4">
          <div class="card card-secondary bg-secondary-gradient">
            <div class="card-body bubble-shadow">
              <h1>{{ $subscribers }}</h1>
              <h5 class="op-8">Subscribers</h5>
              <div class="pull-right">
                <h3 class="fw-bold op-8"></h3>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card card-secondary bg-secondary-gradient">
            <div class="card-body curves-shadow">
              <h1>{{ $allsliders }}</h1>
              <h5 class="op-8">Sliders</h5>
              <div class="pull-right">
                <h3 class="fw-bold op-8"></h3>
              </div>
            </div>
          </div>
        </div>
      </div>


    </div>
  </div>

@endsection