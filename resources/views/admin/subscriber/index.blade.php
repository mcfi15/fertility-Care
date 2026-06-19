@extends('layouts.admin')

@section('title', 'All Subscribers')

@section('content')
<div class="container">
    <div class="page-inner">
        <div class="page-header">
        <h3 class="fw-bold mb-3">Subscribers</h3>
        <ul class="breadcrumbs mb-3">
            <li class="nav-home">
            <a href="{{ url('admin/dashboard') }}">
                <i class="icon-home"></i>
            </a>
            </li>
            <li class="separator">
            <i class="icon-arrow-right"></i>
            </li>
            
            <li class="nav-item">
            <a href="#">Subscribers</a>
            </li>
        </ul>
        </div>
        <div class="row">

        <div class="col-md-12">
            <div class="card">
            <div class="card-header">
                <div class="d-flex align-items-center">
                <h4 class="card-title">All Subscribers</h4>
                
                </div>
            </div>
            <div class="card-body">
                @include('layouts.alert.msg')
                <div class="table-responsive">
                <table class="display table table-striped table-hover">
                    <thead>
                    <tr>
                        <th>Email</th>
                        <th>Date Created</th>
                        <th style="width: 10%">Action</th>
                    </tr>
                    </thead>
                    
                    <tbody>

                    @forelse ($subscribers as $subscriber)    
                    <tr>
                        <td>{{ $subscriber->email }}</td>
                        <td>{{ $subscriber->created_at }}</td>
                        <td>
                        <div class="form-button-action">
                            
                            <a href="{{ url('admin/subscribers/'.$subscriber->id.'/delete') }}" onclick="return confirm('Are you sure you want to delete this email?')" class="btn btn-link btn-danger" data-original-title="Remove">
                            <i class="fa fa-times"></i>
                            </a>
                        </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5">No Subscriber Details Found</td>
                    </tr>
                    @endforelse
                    
                    
                    </tbody>
                </table>
                </div>
                {{ $subscribers->links() }}
            </div>
            </div>
        </div>
        </div>
    </div>
</div>

@endsection