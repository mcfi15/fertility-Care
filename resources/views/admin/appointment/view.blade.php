@extends('layouts.admin')

@section('title', 'View Appointment')

@section('content')
<div class="container">
    <div class="page-inner">
      <div class="page-header">
        <h3 class="fw-bold mb-3">View Appointment</h3>
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
            <a href="{{ url('admin/appointments') }}">Appointments</a>
          </li>
          <li class="separator">
            <i class="icon-arrow-right"></i>
          </li>
          <li class="nav-item">
            <a href="#">View</a>
          </li>
        </ul>
      </div>
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header">
                <div class="d-flex align-items-center">
                <h4 class="card-title">Appointment Details</h4>
                <a href="{{ url('admin/appointments') }}" class="btn btn-primary btn-round ms-auto">
                    <i class="fa fa-arrow-left"></i>
                    Back
                </a>
                </div>
            </div>
              <table class="table table-bordered">
                <tbody>
                  <tr>
                    <td style="width: 30%">Name</td>
                    <td>{{ $appointment->name }}</td>
                  </tr>
                  <tr>
                    <td>Email</td>
                    <td>{{ $appointment->email }}</td>
                  </tr>
                  <tr>
                    <td>Location</td>
                    <td>{{ $appointment->location }}</td>
                  </tr>
                  <tr>
                    <td>Appointment Date</td>
                    <td>{{ $appointment->appointment_date }}</td>
                  </tr>
                  <tr>
                    <td>Appointment Time</td>
                    <td>{{ $appointment->appointment_time }}</td>
                  </tr>
                  <tr>
                    <td>Duration</td>
                    <td>{{ $appointment->duration }}</td>
                  </tr>
                  <tr>
                    <td>Appointment Type</td>
                    <td>{{ $appointment->appointment_type }}</td>
                  </tr>
                  <tr>
                    <td>Status</td>
                    <td>{{ $appointment->status ?? 'Pending' }}</td>
                  </tr>
                  <tr>
                    <td>Reason</td>
                    <td>{!! $appointment->reason !!}</td>
                  </tr>
                  <tr>
                    <td>Date Created</td>
                    <td>{{ $appointment->created_at->format('Y-m-d H:i') }}</td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection