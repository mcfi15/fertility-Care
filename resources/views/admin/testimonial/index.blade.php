@extends('layouts.admin')

@section('title', 'Testimonials')

@section('content')
  <div class="container">
    <div class="page-inner">
      <div class="page-header d-flex justify-content-between align-items-center flex-wrap gap-2">
        <div>
          <h3 class="fw-bold mb-1">Testimonials</h3>
          <ul class="breadcrumbs mb-0">
            <li class="nav-home"><a href="{{ url('admin/dashboard') }}"><i class="icon-home"></i></a></li>
            <li class="separator"><i class="icon-arrow-right"></i></li>
            <li class="nav-item"><a href="#">Testimonials</a></li>
          </ul>
        </div>
        <a href="{{ route('admin.testimonials.create') }}" class="btn btn-primary btn-round">
          <i class="fa fa-plus me-1"></i> New testimonial
        </a>
      </div>

      @include('layouts.alert.msg')

      <div class="card card-round">
        <div class="card-header">
          <div class="card-title">All testimonials ({{ $testimonials->total() }})</div>
        </div>
        <div class="card-body p-0">
          <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
              <thead>
                <tr>
                  <th style="width:60px;">Order</th>
                  <th>Person</th>
                  <th>Category</th>
                  <th>Quote</th>
                  <th style="width:110px;">Rating</th>
                  <th style="width:90px;">Status</th>
                  <th style="width:170px;" class="text-end">Actions</th>
                </tr>
              </thead>
              <tbody>
                @forelse ($testimonials as $t)
                  <tr>
                    <td>
                      <div class="btn-group btn-group-sm">
                        <form method="POST" action="{{ route('admin.testimonials.move', $t) }}">
                          @csrf
                          <input type="hidden" name="direction" value="up">
                          <button class="btn btn-outline-secondary" title="Move up"><i class="fa fa-arrow-up"></i></button>
                        </form>
                        <form method="POST" action="{{ route('admin.testimonials.move', $t) }}">
                          @csrf
                          <input type="hidden" name="direction" value="down">
                          <button class="btn btn-outline-secondary" title="Move down"><i class="fa fa-arrow-down"></i></button>
                        </form>
                      </div>
                    </td>
                    <td>
                      <div class="d-flex align-items-center gap-2">
                        @if ($t->imageUrl())
                          <img src="{{ $t->imageUrl() }}" alt="" style="height:38px;width:38px;object-fit:cover;border-radius:50%;">
                        @else
                          <span class="avatar avatar-sm" style="background:#e9ecef;color:#005b7b;font-weight:700;">{{ $t->initial() }}</span>
                        @endif
                        <div>
                          <div class="fw-semibold">{{ $t->name }}</div>
                          <div class="small text-muted">{{ $t->role }}{{ $t->location ? ' · '.$t->location : '' }}</div>
                        </div>
                      </div>
                    </td>
                    <td><span class="badge bg-light text-dark">{{ $t->category ?: '—' }}</span></td>
                    <td class="text-muted small">{{ \Illuminate\Support\Str::limit($t->quote, 90) }}</td>
                    <td>
                      @for ($i = 0; $i < 5; $i++)
                        <i class="fa fa-star {{ $i < $t->rating ? 'text-warning' : 'text-muted opacity-25' }}"></i>
                      @endfor
                    </td>
                    <td>
                      <form method="POST" action="{{ route('admin.testimonials.toggle', $t) }}">
                        @csrf
                        @if ($t->is_active)
                          <button class="badge bg-success border-0" title="Click to hide">Active</button>
                        @else
                          <button class="badge bg-secondary border-0" title="Click to show">Hidden</button>
                        @endif
                      </form>
                    </td>
                    <td class="text-end">
                      <a href="{{ route('admin.testimonials.edit', $t) }}" class="btn btn-sm btn-primary btn-round"><i class="fa fa-edit"></i></a>
                      <form method="POST" action="{{ route('admin.testimonials.destroy', $t) }}" class="d-inline"
                            onsubmit="return confirm('Delete this testimonial?');">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-sm btn-danger btn-round"><i class="fa fa-trash"></i></button>
                      </form>
                    </td>
                  </tr>
                @empty
                  <tr><td colspan="7" class="text-center text-muted py-4">No testimonials yet.</td></tr>
                @endforelse
              </tbody>
            </table>
          </div>
        </div>
        @if ($testimonials->hasPages())
          <div class="card-footer">{{ $testimonials->links() }}</div>
        @endif
      </div>
    </div>
  </div>
@endsection
