@extends('layouts.admin')

@section('title', 'FAQs')

@section('content')
<div class="container">
    <div class="page-inner">
        <div class="page-header">
            <h3 class="fw-bold mb-3">FAQs</h3>
            <ul class="breadcrumbs mb-3">
                <li class="nav-home">
                    <a href="{{ url('admin/dashboard') }}"><i class="icon-home"></i></a>
                </li>
                <li class="separator"><i class="icon-arrow-right"></i></li>
                <li class="nav-item"><a href="#">FAQs</a></li>
            </ul>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex align-items-center">
                            <h4 class="card-title">Frequently Asked Questions</h4>
                            <a href="{{ url('admin/faqs/create') }}" class="btn btn-primary btn-round ms-auto">
                                <i class="fa fa-plus"></i> Add FAQ
                            </a>
                        </div>
                    </div>
                    <div class="card-body">
                        @include('layouts.alert.msg')
                        <div class="table-responsive">
                            <table class="display table table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Question</th>
                                        <th>Answer</th>
                                        <th>Position</th>
                                        <th>Status</th>
                                        <th style="width: 15%">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($faqs as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ Str::limit($item->question, 50) }}</td>
                                        <td>{{ Str::limit(strip_tags($item->answer), 60) }}</td>
                                        <td>{{ $item->position }}</td>
                                        <td>
                                            @if($item->status)
                                                <span class="badge badge-success">Active</span>
                                            @else
                                                <span class="badge badge-secondary">Hidden</span>
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{ url('admin/faqs/'.$item->id.'/edit') }}" class="btn btn-link btn-primary btn-lg">
                                                <i class="fa fa-edit"></i>
                                            </a>
                                            <a href="{{ url('admin/faqs/'.$item->id.'/delete') }}"
                                               onclick="return confirm('Are you sure you want to delete this FAQ?')"
                                               class="btn btn-link btn-danger">
                                                <i class="fa fa-times"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td colspan="6" class="text-center">No FAQs found. <a href="{{ url('admin/faqs/create') }}">Create one</a></td>
                                    </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection