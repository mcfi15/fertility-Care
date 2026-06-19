@extends('layouts.admin')

@section('title', 'Add New Job')

@section('content')

<div class="container">
    <div class="page-inner">
      <div class="page-header">
        <h3 class="fw-bold mb-3">View Job</h3>
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
            <a href="#">View Jobs</a>
          </li>
        </ul>
      </div>
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header">
                <div class="d-flex align-items-center">
                <h4 class="card-title">View Job</h4>
                <a href="{{ url('admin/jobs') }}" class="btn btn-primary btn-round ms-auto">
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
                      {{$jobs->title}}
                    </td>
                  </tr>
                  <tr>
                    <td style="width: 40%; vertical-align: middle">
                      Small Description
                    </td>
                    <td>
                        {{$jobs->small_description}}
                    </td>
                  </tr>
                  <tr>
                    <td style="width: 40%; vertical-align: middle">
                      Eligibility Criteria
                    </td>
                    <td>
                        {{$jobs->eligibility}}
                    </td>
                  </tr>
                  <tr>
                    <td style="width: 40%; vertical-align: middle">
                      Job Description
                    </td>
                    <td>
                        {!! $jobs->description !!}
                    </td>
                  </tr>
                  <tr>
                    <td style="width: 40%; vertical-align: middle">
                      Job Location
                    </td>
                    <td>
                        {{$jobs->location}}
                    </td>
                  </tr>
                  <tr>
                    <td style="width: 40%; vertical-align: middle">
                      Closing Date
                    </td>
                    <td>
                        {{$jobs->closing_date}}
                    </td>
                  </tr>
                  <tr>
                    <td style="width: 40%; vertical-align: middle">
                      Job Status
                    </td>
                    <td>
                      {{ $jobs->status == '1' ? 'Expired':'Active'}}
                    </td>
                  </tr>
                  <tr>
                    <td style="width: 40%; vertical-align: middle">
                        Employment Type
                    </td>
                    <td>
                      {{$jobs->type}}
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