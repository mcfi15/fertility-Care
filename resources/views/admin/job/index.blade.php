@extends('layouts.admin')

@section('title', 'Jobs')

@section('content')
<div class="container">
    <div class="page-inner">
        <div class="page-header">
        <h3 class="fw-bold mb-3">Jobs</h3>
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
            <a href="#">Jobs</a>
            </li>
        </ul>
        </div>
        <div class="row">

        <div class="col-md-12">
            <div class="card">
            <div class="card-header">
                <div class="d-flex align-items-center">
                <h4 class="card-title">Jobs</h4>
                <a href="{{ url('admin/jobs/create') }}" class="btn btn-primary btn-round ms-auto">
                    <i class="fa fa-plus"></i>
                    Add New
                </a>
                </div>
                
            </div>
            <div class="card-body">
                @include('layouts.alert.msg')
                <div class="table-responsive">
                <table class="display table table-striped table-hover">
                    <thead>
                    <tr>
                        <th>title</th>
                        <th>Status</th>
                        <th>Date Created</th>
                        <th>Closing Date</th>

                        <th style="width: 10%">Action</th>
                    </tr>
                    </thead>
                    
                    <tbody>

                    @forelse ($jobs as $job)    
                    <tr>
                        <td>{{ $job->title }}</td>
                        <td>{{ $job->status == '1' ? 'Expired':'Active'}}</td>
                        <td>{{ $job->created_at }}</td>
                        <td>{{ $job->closing_date }}</td>
                        <td>
                        <div class="form-button-action">
                            <a href="{{ url('admin/jobs/'.$job->id.'/view') }}" class="btn btn-link btn-secondary btn-lg" data-original-title="Edit Task">
                                <i class="fa fa-eye"></i>
                                </a>
                            <a href="{{ url('admin/jobs/'.$job->id.'/edit') }}" class="btn btn-link btn-primary btn-lg" data-original-title="Edit Task">
                            <i class="fa fa-edit"></i>
                            </a>
                            <a href="{{ url('admin/jobs/'.$job->id.'/delete') }}" onclick="return confirm('Are you sure you want to delete this job?')" class="btn btn-link btn-danger" data-original-title="Remove">
                            <i class="fa fa-times"></i>
                            </a>
                        </div>
                        </td>
                    </tr>
                    
                    @empty

                    <tr>
                        <td colspan="5">No Job Offers Found</td>
                    </tr>
                        
                    @endforelse
                    
                    
                    </tbody>
                </table>
                </div>
                {{ $jobs->links() }}
            </div>
            </div>
        </div>
        </div>
    </div>
</div>

@endsection