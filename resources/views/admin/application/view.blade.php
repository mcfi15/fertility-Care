@extends('layouts.admin')

@section('title', 'View Application')

@section('content')

<div class="container">
    <div class="page-inner">
      <div class="page-header">
        <h3 class="fw-bold mb-3">View Application</h3>
        <ul class="breadcrumbs mb-3">
          <li class="nav-home">
            <a href="#">
              <i class="icon-home"></i>
            </a>
          </li>
          <li class="separator">
            <i class="icon-arrow-right"></i>
          </li>
          <li class="nav-item">
            <a href="{{ url('admin/dashboard') }}">Home</a>
          </li>
          <li class="separator">
            <i class="icon-arrow-right"></i>
          </li>
          <li class="nav-item">
            <a href="#">View Application</a>
          </li>
        </ul>
      </div>
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header">
                <div class="d-flex align-items-center">
                <h4 class="card-title">View Application</h4>
                <a href="{{ url('admin/applications') }}" class="btn btn-primary btn-round ms-auto">
                    <i class="fa fa-arrow-left"></i>
                    Back
                </a>
                </div>
            </div>
              <table class="table table-bordered">
                <tbody>
                  <tr>
                    <td style="width: 40%; vertical-align: middle">
                      Job Title
                    </td>
                    <td>
                      {{$jobs->job_title}}
                    </td>
                  </tr>
                  <tr>
                    <td style="width: 40%; vertical-align: middle">
                      First Name
                    </td>
                    <td>
                        {{$jobs->firstname}}
                    </td>
                  </tr>
                  <tr>
                    <td style="width: 40%; vertical-align: middle">
                      Middle Name
                    </td>
                    <td>
                        {{$jobs->middlename}}
                    </td>
                  </tr>
                  <tr>
                    <td style="width: 40%; vertical-align: middle">
                      Last Name
                    </td>
                    <td>
                        {!! $jobs->lastname !!}
                    </td>
                  </tr>
                  <tr>
                    <td style="width: 40%; vertical-align: middle">
                      Email
                    </td>
                    <td>
                        {{$jobs->email}}
                    </td>
                  </tr>
                  <tr>
                    <td style="width: 40%; vertical-align: middle">
                      Phone Number
                    </td>
                    <td>
                        {{$jobs->phone}}
                    </td>
                  </tr>
                  <tr>
                    <td style="width: 40%; vertical-align: middle">
                      Applied Position
                    </td>
                    <td>
                      {{ $jobs->position }}
                    </td>
                  </tr>
                  <tr>
                    <td style="width: 40%; vertical-align: middle">
                        Cover Letter
                    </td>
                    <td>
                      {!! $jobs->coverletter !!} 
                    </td>
                  </tr>

                  <tr>
                    <td style="width: 40%; vertical-align: middle">
                        CV
                    </td>
                    <td>
                        <iframe src="{{ asset($jobs->cv) }}" width="50%" height="600">
                            This browser does not support PDFs. Please download the PDF to view it: <a href="{{ asset($jobs->cv) }}">Download PDF</a>
                    </iframe>
                    </td>
                  </tr>

                  <tr>
                    <td style="width: 40%; vertical-align: middle">
                        Other Document
                    </td>
                    <td>
                        <iframe src="{{ asset($jobs->other) }}" width="50%" height="600">
                            This browser does not support PDFs. Please download the PDF to view it: <a href="{{ asset($jobs->cv) }}">Download PDF</a>
                    </iframe>
                    </td>
                  </tr>

                  <tr>
                    <td style="width: 40%; vertical-align: middle">
                        Date Created
                    </td>
                    <td>
                      {{$jobs->created_at}}
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  

  @endsection