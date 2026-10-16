@extends('layouts.admin')

@section('title', 'FAQs')

@section('content')
  <div class="container">
    <div class="page-inner">
      <div class="page-header d-flex justify-content-between align-items-center flex-wrap gap-2">
        <div>
          <h3 class="fw-bold mb-1">Frequently asked questions</h3>
          <ul class="breadcrumbs mb-0">
            <li class="nav-home"><a href="{{ url('admin/dashboard') }}"><i class="icon-home"></i></a></li>
            <li class="separator"><i class="icon-arrow-right"></i></li>
            <li class="nav-item"><a href="#">FAQs</a></li>
          </ul>
        </div>
        <a href="{{ route('admin.faqs.create') }}" class="btn btn-primary btn-round">
          <i class="fa fa-plus me-1"></i> New FAQ
        </a>
      </div>

      @include('layouts.alert.msg')

      @forelse ($groups as $category => $faqs)
        <div class="card card-round">
          <div class="card-header">
            <div class="card-title">{{ $category ?: 'Uncategorised' }} <span class="badge bg-light text-dark ms-1">{{ $faqs->count() }}</span></div>
          </div>
          <div class="card-body p-0">
            <div class="table-responsive">
              <table class="table table-hover align-middle mb-0">
                <thead>
                  <tr>
                    <th style="width:60px;">Order</th>
                    <th>Question</th>
                    <th style="width:90px;">Status</th>
                    <th style="width:150px;" class="text-end">Actions</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($faqs as $faq)
                    <tr>
                      <td>
                        <div class="btn-group btn-group-sm">
                          <form method="POST" action="{{ route('admin.faqs.move', $faq) }}">
                            @csrf
                            <input type="hidden" name="direction" value="up">
                            <button class="btn btn-outline-secondary"><i class="fa fa-arrow-up"></i></button>
                          </form>
                          <form method="POST" action="{{ route('admin.faqs.move', $faq) }}">
                            @csrf
                            <input type="hidden" name="direction" value="down">
                            <button class="btn btn-outline-secondary"><i class="fa fa-arrow-down"></i></button>
                          </form>
                        </div>
                      </td>
                      <td>
                        <div class="fw-semibold">{{ $faq->question }}</div>
                        <div class="small text-muted">{{ \Illuminate\Support\Str::limit(strip_tags($faq->answer), 110) }}</div>
                      </td>
                      <td>
                        <form method="POST" action="{{ route('admin.faqs.toggle', $faq) }}">
                          @csrf
                          @if ($faq->is_active)
                            <button class="badge bg-success border-0">Active</button>
                          @else
                            <button class="badge bg-secondary border-0">Hidden</button>
                          @endif
                        </form>
                      </td>
                      <td class="text-end">
                        <a href="{{ route('admin.faqs.edit', $faq) }}" class="btn btn-sm btn-primary btn-round"><i class="fa fa-edit"></i></a>
                        <form method="POST" action="{{ route('admin.faqs.destroy', $faq) }}" class="d-inline"
                              onsubmit="return confirm('Delete this FAQ?');">
                          @csrf
                          @method('DELETE')
                          <button class="btn btn-sm btn-danger btn-round"><i class="fa fa-trash"></i></button>
                        </form>
                      </td>
                    </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
          </div>
        </div>
      @empty
        <div class="card card-round"><div class="card-body text-center text-muted py-5">No FAQs yet.</div></div>
      @endforelse
    </div>
  </div>
@endsection
