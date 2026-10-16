@extends('layouts.admin')

@section('title', 'Centers Directory')

@section('content')
  <div class="container">
    <div class="page-inner">
      <div class="page-header d-flex justify-content-between align-items-center flex-wrap gap-2">
        <div>
          <h3 class="fw-bold mb-1">Centers Directory</h3>
          <ul class="breadcrumbs mb-0">
            <li class="nav-home"><a href="{{ url('admin/dashboard') }}"><i class="icon-home"></i></a></li>
            <li class="separator"><i class="icon-arrow-right"></i></li>
            <li class="nav-item"><a href="#">Centers Directory</a></li>
          </ul>
        </div>
        <a href="{{ route('admin.centers.create', ['type' => $type]) }}" class="btn btn-primary btn-round">
          <i class="fa fa-plus me-1"></i> New entry
        </a>
      </div>

      @include('layouts.alert.msg')

      <ul class="nav nav-pills mb-3">
        @foreach ($types as $key => $label)
          <li class="nav-item">
            <a class="nav-link {{ $type === $key ? 'active' : '' }}" href="{{ route('admin.centers.index', ['type' => $key]) }}">{{ $label }}</a>
          </li>
        @endforeach
      </ul>

      <div class="card card-round">
        <div class="card-header">
          <div class="card-title">{{ $types[$type] }} ({{ $centers->total() }})</div>
        </div>
        <div class="card-body p-0">
          <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
              <thead>
                <tr>
                  <th>Name</th>
                  <th>Country</th>
                  <th>City / State</th>
                  <th>Contact</th>
                  <th>{{ $type === 'doctor' ? 'Focus' : 'Hours' }}</th>
                  <th style="width:90px;">Status</th>
                  <th style="width:150px;" class="text-end">Actions</th>
                </tr>
              </thead>
              <tbody>
                @forelse ($centers as $center)
                  <tr>
                    <td class="fw-semibold">{{ $center->name }}</td>
                    <td>{{ $center->country }}</td>
                    <td class="text-muted">{{ $center->city ?: '—' }}{{ $center->state ? ', '.$center->state : '' }}</td>
                    <td class="small text-muted">
                      @if ($center->phone)<div><i class="fa fa-phone me-1"></i>{{ $center->phone }}</div>@endif
                      @if ($center->email)<div><i class="fa fa-envelope me-1"></i>{{ $center->email }}</div>@endif
                      @if (! $center->phone && ! $center->email)—@endif
                    </td>
                    <td class="small text-muted">
                      @if ($type === 'doctor')
                        {{ $center->specialty ?: '—' }}
                      @else
                        {{ $center->hours ?: '—' }}
                      @endif
                    </td>
                    <td>
                      <form method="POST" action="{{ route('admin.centers.toggle', $center) }}">
                        @csrf
                        @if ($center->is_active)
                          <button class="badge bg-success border-0">Active</button>
                        @else
                          <button class="badge bg-secondary border-0">Hidden</button>
                        @endif
                      </form>
                    </td>
                    <td class="text-end">
                      <a href="{{ route('admin.centers.edit', $center) }}" class="btn btn-sm btn-primary btn-round"><i class="fa fa-edit"></i></a>
                      <form method="POST" action="{{ route('admin.centers.destroy', $center) }}" class="d-inline"
                            onsubmit="return confirm('Delete this directory entry?');">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-sm btn-danger btn-round"><i class="fa fa-trash"></i></button>
                      </form>
                    </td>
                  </tr>
                @empty
                  <tr><td colspan="7" class="text-center text-muted py-4">No entries yet.</td></tr>
                @endforelse
              </tbody>
            </table>
          </div>
        </div>
        @if ($centers->hasPages())
          <div class="card-footer">{{ $centers->links() }}</div>
        @endif
      </div>
    </div>
  </div>
@endsection
