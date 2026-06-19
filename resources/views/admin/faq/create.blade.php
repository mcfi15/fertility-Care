@extends('layouts.admin')

@section('title', 'Create FAQ')

@section('content')
<div class="container">
    <div class="page-inner">
        <div class="page-header">
            <h3 class="fw-bold mb-3">Create FAQ</h3>
            <ul class="breadcrumbs mb-3">
                <li class="nav-home">
                    <a href="{{ url('admin/dashboard') }}"><i class="icon-home"></i></a>
                </li>
                <li class="separator"><i class="icon-arrow-right"></i></li>
                <li class="nav-item"><a href="{{ url('admin/faqs') }}">FAQs</a></li>
                <li class="separator"><i class="icon-arrow-right"></i></li>
                <li class="nav-item"><a href="#">Create</a></li>
            </ul>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex align-items-center">
                            <h4 class="card-title">New FAQ</h4>
                            <a href="{{ url('admin/faqs') }}" class="btn btn-secondary btn-round ms-auto">
                                <i class="fa fa-arrow-left"></i> Back
                            </a>
                        </div>
                    </div>
                    <form action="{{ url('admin/faqs/create') }}" method="POST">
                        @csrf
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label for="question">Question</label>
                                        <input type="text" name="question" id="question" class="form-control @error('question') is-invalid @enderror" value="{{ old('question') }}" placeholder="Enter the FAQ question">
                                        @error('question') <small class="text-danger">{{ $message }}</small> @enderror
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="position">Position (order)</label>
                                        <input type="number" name="position" id="position" class="form-control" value="{{ old('position', \App\Models\Faq::max('position') + 1) }}">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="answer">Answer</label>
                                        <textarea name="answer" id="answer" class="form-control @error('answer') is-invalid @enderror" rows="6" placeholder="Enter the FAQ answer">{{ old('answer') }}</textarea>
                                        @error('answer') <small class="text-danger">{{ $message }}</small> @enderror
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="status" id="status" value="1" checked>
                                            <label class="form-check-label" for="status">Active (visible on site)</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-action">
                            <button type="submit" class="btn btn-success">Save FAQ</button>
                            <a href="{{ url('admin/faqs') }}" class="btn btn-danger">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection