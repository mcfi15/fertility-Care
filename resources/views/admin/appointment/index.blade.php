@extends('layouts.admin')

@section('title', 'Appointments')

@section('content')
<div class="container">
    <div class="page-inner">
        <div class="page-header">
        <h3 class="fw-bold mb-3">Appointments</h3>
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
            <a href="#">Appointments</a>
            </li>
        </ul>
        </div>
        <div class="row">
        <div class="col-md-12">
            <div class="card">
            <div class="card-header">
                <div class="d-flex align-items-center">
                <h4 class="card-title">Appointments</h4>
                </div>
            </div>
            <div class="card-body">
                @include('layouts.alert.msg')
                <div class="table-responsive">
                <table class="display table table-striped table-hover">
                    <thead>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Location</th>
                        <th>Appointment Date</th>
                        <th>Type</th>
                        <th>Status</th>
                        <th>Date Created</th>
                        <th style="width: 10%">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse ($apps as $item)
                    <tr>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->email }}</td>
                        <td>{{ $item->location }}</td>
                        <td>{{ $item->appointment_date }} {{ $item->appointment_time }}</td>
                        <td>{{ $item->appointment_type }}</td>
                        <td>{{ $item->status ?? 'Pending' }}</td>
                        <td>{{ $item->created_at->format('Y-m-d') }}</td>
                        <td>
                        <div class="form-button-action">
                            <a href="{{ url('admin/appointments/'.$item->id.'/view') }}" class="btn btn-link btn-secondary btn-lg">
                                <i class="fa fa-eye"></i>
                            </a>
                            <a href="{{ url('admin/appointments/'.$item->id.'/delete') }}" onclick="return confirm('Are you sure you want to delete this appointment?')" class="btn btn-link btn-danger">
                            <i class="fa fa-times"></i>
                            </a>
                        </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="8">No Appointments Found</td>
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