@extends('layouts.admin')

@section('title', 'Edit directory entry')

@section('content')
  <div class="container">
    <div class="page-inner">
      <div class="page-header">
        <h3 class="fw-bold mb-1">Edit directory entry</h3>
        <ul class="breadcrumbs mb-0">
          <li class="nav-home"><a href="{{ url('admin/dashboard') }}"><i class="icon-home"></i></a></li>
          <li class="separator"><i class="icon-arrow-right"></i></li>
          <li class="nav-item"><a href="{{ route('admin.centers.index', ['type' => $center->type]) }}">Centers Directory</a></li>
          <li class="separator"><i class="icon-arrow-right"></i></li>
          <li class="nav-item"><a href="#">{{ \Illuminate\Support\Str::limit($center->name, 40) }}</a></li>
        </ul>
      </div>

      @include('layouts.alert.msg')
      @if ($errors->any())
        <div class="alert alert-danger">Please correct the highlighted fields.</div>
      @endif

      @include('admin.center.form', ['action' => route('admin.centers.update', $center), 'method' => 'PUT'])
    </div>
  </div>
@endsection
