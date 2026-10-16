@extends('layouts.admin')

@section('title', 'Page Content')

{{--
  Admin ▸ Page Content Manager.

  Pick a page on the left, edit its writeups on the right. Every heading and
  paragraph that was previously hard-coded is now a database setting from
  config/site_pages.php.
--}}
@section('content')
  <div class="container">
    <div class="page-inner">
      <div class="page-header">
        <h3 class="fw-bold mb-3">Page Content Manager</h3>
        <ul class="breadcrumbs mb-3">
          <li class="nav-home"><a href="{{ url('admin/dashboard') }}"><i class="icon-home"></i></a></li>
          <li class="separator"><i class="icon-arrow-right"></i></li>
          <li class="nav-item"><a href="#">Page Content</a></li>
        </ul>
      </div>

      @include('layouts.alert.msg')

      <div class="row">
        {{-- Page picker --}}
        <div class="col-lg-3">
          <div class="card card-round">
            <div class="card-header">
              <div class="card-title">Pages</div>
            </div>
            <div class="card-body p-0" style="max-height:70vh;overflow-y:auto;">
              <div class="list-group list-group-flush">
                @foreach ($pages as $s => $p)
                  <a href="{{ route('admin.pages', ['page' => $s]) }}"
                     class="list-group-item list-group-item-action {{ $s === $slug ? 'active' : '' }}">
                    <span class="fw-semibold">{{ $p['label'] }}</span>
                    <span class="d-block small {{ $s === $slug ? 'text-white-50' : 'text-muted' }}">
                      {{ $p['url'] ?? '' }}
                    </span>
                  </a>
                @endforeach
              </div>
            </div>
          </div>
        </div>

        {{-- Editor --}}
        <div class="col-lg-9">
          <form method="POST" action="{{ route('admin.pages.update', ['page' => $slug]) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="card card-round">
              <div class="card-header d-flex justify-content-between align-items-center">
                <div>
                  <div class="card-title mb-0">{{ $meta['label'] }}</div>
                  <small class="text-muted">{{ $meta['url'] ?? '' }}</small>
                </div>
                @if (! empty($meta['url']))
                  <a href="{{ $meta['url'] }}" target="_blank" rel="noopener" class="btn btn-sm btn-outline-primary">
                    <i class="fa fa-external-link-alt me-1"></i> View page
                  </a>
                @endif
              </div>

              <div class="card-body">
                @forelse ($fields as $field)
                  @include('admin.partials.field', ['field' => $field])
                @empty
                  <p class="text-muted mb-0">This page has no editable fields yet.</p>
                @endforelse
              </div>

              @if (! empty($fields))
                <div class="card-footer text-end">
                  <button type="submit" class="btn btn-primary btn-round px-4">
                    <i class="fa fa-save me-1"></i> Save page
                  </button>
                </div>
              @endif
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
@endsection
