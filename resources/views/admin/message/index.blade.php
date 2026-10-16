@extends('layouts.admin')

@section('title', 'Messages')

@section('content')
  <div class="container">
    <div class="page-inner">
      <div class="page-header d-flex justify-content-between align-items-center flex-wrap gap-2">
        <div>
          <h3 class="fw-bold mb-1">Contact messages</h3>
          <ul class="breadcrumbs mb-0">
            <li class="nav-home"><a href="{{ url('admin/dashboard') }}"><i class="icon-home"></i></a></li>
            <li class="separator"><i class="icon-arrow-right"></i></li>
            <li class="nav-item"><a href="#">Messages</a></li>
          </ul>
        </div>
        <div class="d-flex gap-2">
          <a href="{{ route('admin.messages.index', ['filter' => 'all']) }}" class="btn btn-round {{ $filter === 'all' ? 'btn-primary' : 'btn-light' }}">All</a>
          <a href="{{ route('admin.messages.index', ['filter' => 'unread']) }}" class="btn btn-round {{ $filter === 'unread' ? 'btn-primary' : 'btn-light' }}">
            Unread @if ($unreadCount)<span class="badge bg-danger ms-1">{{ $unreadCount }}</span>@endif
          </a>
        </div>
      </div>

      @include('layouts.alert.msg')

      <div class="card card-round">
        <div class="card-header">
          <div class="card-title">{{ $filter === 'unread' ? 'Unread messages' : 'All messages' }} ({{ $messages->total() }})</div>
        </div>
        <div class="card-body p-0">
          <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
              <thead>
                <tr>
                  <th style="width:40px;"></th>
                  <th>From</th>
                  <th>Subject</th>
                  <th>Message</th>
                  <th style="width:130px;">Received</th>
                  <th style="width:130px;" class="text-end">Actions</th>
                </tr>
              </thead>
              <tbody>
                @forelse ($messages as $msg)
                  <tr class="{{ $msg->is_read ? '' : 'fw-semibold' }}">
                    <td>
                      @if (! $msg->is_read)
                        <span class="badge bg-primary">&nbsp;</span>
                      @endif
                    </td>
                    <td>
                      <div>{{ $msg->name }}</div>
                      <div class="small text-muted fw-normal">{{ $msg->email }}</div>
                    </td>
                    <td>{{ $msg->subject ?: '—' }}</td>
                    <td class="text-muted small fw-normal">{{ \Illuminate\Support\Str::limit($msg->message, 70) }}</td>
                    <td class="small text-muted fw-normal">{{ $msg->created_at->format('M j, Y H:i') }}</td>
                    <td class="text-end">
                      <a href="{{ route('admin.messages.show', $msg) }}" class="btn btn-sm btn-primary btn-round"><i class="fa fa-eye"></i></a>
                      <form method="POST" action="{{ route('admin.messages.destroy', $msg) }}" class="d-inline"
                            onsubmit="return confirm('Delete this message?');">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-sm btn-danger btn-round"><i class="fa fa-trash"></i></button>
                      </form>
                    </td>
                  </tr>
                @empty
                  <tr><td colspan="6" class="text-center text-muted py-4">No messages.</td></tr>
                @endforelse
              </tbody>
            </table>
          </div>
        </div>
        @if ($messages->hasPages())
          <div class="card-footer">{{ $messages->links() }}</div>
        @endif
      </div>
    </div>
  </div>
@endsection
