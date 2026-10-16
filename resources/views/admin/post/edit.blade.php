@extends('layouts.admin')

@section('title', 'Edit post')

@section('content')
  <div class="container">
    <div class="page-inner">
      <div class="page-header">
        <h3 class="fw-bold mb-1">Edit post</h3>
        <ul class="breadcrumbs mb-0">
          <li class="nav-home"><a href="{{ url('admin/dashboard') }}"><i class="icon-home"></i></a></li>
          <li class="separator"><i class="icon-arrow-right"></i></li>
          <li class="nav-item"><a href="{{ route('admin.posts.index') }}">Blog</a></li>
          <li class="separator"><i class="icon-arrow-right"></i></li>
          <li class="nav-item"><a href="#">{{ \Illuminate\Support\Str::limit($post->title, 40) }}</a></li>
        </ul>
      </div>

      @include('layouts.alert.msg')
      @if ($errors->any())
        <div class="alert alert-danger">Please correct the highlighted fields.</div>
      @endif

      @include('admin.post.form', ['action' => route('admin.posts.update', $post), 'method' => 'PUT'])
    </div>
  </div>
@endsection
