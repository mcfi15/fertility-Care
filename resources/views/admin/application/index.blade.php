@extends('layouts.admin')

@section('title', 'Applications')

@section('content')
<div class="container">
    <div class="page-inner">
        <div class="page-header">
        <h3 class="fw-bold mb-3">Applications</h3>
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
            <a href="#">Applications</a>
            </li>
        </ul>
        </div>
        <div class="row">

        <div class="col-md-12">
            <div class="card">
            <div class="card-header">
                <div class="d-flex align-items-center">
                <h4 class="card-title">Applications</h4>
                
                </div>
                
            </div>
            <div class="card-body">
                @include('layouts.alert.msg')
                <div class="table-responsive">
                <table class="display table table-striped table-hover">
                    <thead>
                    <tr>
                        <th>title</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Position</th>
                        <th>Date Created</th>
                        

                        <th style="width: 10%">Action</th>
                    </tr>
                    </thead>
                    
                    <tbody>

                    @forelse ($apps as $job)    
                    <tr>
                        <td>{{ $job->job_title }}</td>
                        <td>{{ $job->firstname.' '.$job->lastname}}</td>
                        <td>{{ $job->email }}</td>
                        <td>{{ $job->position }}</td>
                        <td>{{ $job->created_at }}</td>
                        
                        <td>
                        <div class="form-button-action">
                            <a href="{{ url('admin/applications/'.$job->id.'/view') }}" class="btn btn-link btn-secondary btn-lg" data-original-title="Edit Task">
                                <i class="fa fa-eye"></i>
                                </a>
                            
                            <a href="{{ url('admin/applications/'.$job->id.'/delete') }}" onclick="return confirm('Are you sure you want to delete this application?')" class="btn btn-link btn-danger" data-original-title="Remove">
                            <i class="fa fa-times"></i>
                            </a>
                        </div>
                        </td>
                    </tr>
                    
                    @empty

                    <tr>
                        <td colspan="5">No Application Found</td>
                    </tr>
                        
                    @endforelse
                    
                    
                    </tbody>
                </table>
                </div>
                {{ $apps->links() }}
            </div>
            </div>
        </div>
        </div>
    </div>
</div>

@endsection