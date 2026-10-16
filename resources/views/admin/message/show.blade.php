@extends('layouts.admin')

@section('title', 'Message')

@section('content')
  <div class="container">
    <div class="page-inner">
      <div class="page-header">
        <h3 class="fw-bold mb-1">Message from {{ $message->name }}</h3>
        <ul class="breadcrumbs mb-0">
          <li class="nav-home"><a href="{{ url('admin/dashboard') }}"><i class="icon-home"></i></a></li>
          <li class="separator"><i class="icon-arrow-right"></i></li>
          <li class="nav-item"><a href="{{ route('admin.messages.index') }}">Messages</a></li>
          <li class="separator"><i class="icon-arrow-right"></i></li>
          <li class="nav-item"><a href="#">{{ \Illuminate\Support\Str::limit($message->subject ?: 'Message', 30) }}</a></li>
        </ul>
      </div>

      @include('layouts.alert.msg')

      <div class="row">
        <div class="col-lg-8">
          <div class="card card-round">
            <div class="card-header d-flex justify-content-between align-items-center">
              <div class="card-title mb-0">{{ $message->subject ?: 'Website enquiry' }}</div>
              <span class="badge {{ $message->is_read ? 'bg-success' : 'bg-primary' }}">{{ $message->is_read ? 'Read' : 'New' }}</span>
            </div>
            <div class="card-body">
              <p class="text-muted mb-4">{{ $message->created_at->format('F j, Y \a\t H:i') }}</p>
              <div style="white-space:pre-line;font-size:15px;line-height:1.7;">{{ $message->message }}</div>
            </div>
            <div class="card-footer d-flex flex-wrap gap-2 justify-content-end">
              <form method="POST" action="{{ route('admin.messages.toggle', $message) }}">
                @csrf
                <button class="btn btn-light btn-round">
                  <i class="fa fa-envelope me-1"></i> Mark as {{ $message->is_read ? 'unread' : 'read' }}
                </button>
              </form>
              <a href="mailto:{{ $message->email }}?subject={{ urlencode('Re: '.($message->subject ?: 'Your message')) }}" class="btn btn-primary btn-round">
                <i class="fa fa-reply me-1"></i> Reply by email
              </a>
              <form method="POST" action="{{ route('admin.messages.destroy', $message) }}"
                    onsubmit="return confirm('Delete this message?');">
                @csrf
                @method('DELETE')
                <button class="btn btn-danger btn-round"><i class="fa fa-trash me-1"></i> Delete</button>
              </form>
            </div>
          </div>
        </div>

        <div class="col-lg-4">
          <div class="card card-round">
            <div class="card-header"><div class="card-title">Sender</div></div>
            <div class="card-body">
              <p class="mb-2"><strong>{{ $message->name }}</strong></p>
              <p class="mb-2"><i class="fa fa-envelope me-1 text-muted"></i> <a href="mailto:{{ $message->email }}">{{ $message->email }}</a></p>
              @if ($message->phone)
                <p class="mb-2"><i class="fa fa-phone me-1 text-muted"></i> {{ $message->phone }}</p>
              @endif
              @if ($message->ip_address)
                <p class="mb-0 small text-muted">IP: {{ $message->ip_address }}</p>
              @endif
            </div>
          </div>
          <a href="{{ route('admin.messages.index') }}" class="btn btn-light btn-round w-100">
            <i class="fa fa-arrow-left me-1"></i> Back to inbox
          </a>
        </div>
      </div>
    </div>
  </div>
@endsection
