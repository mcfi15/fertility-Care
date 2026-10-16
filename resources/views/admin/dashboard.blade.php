@extends('layouts.admin')

@section('title', 'Admin Dashboard')

@section('content')
  <div class="container">
    <div class="page-inner">
      <h3 class="fw-bold mb-3">Dashboard</h3>

      @include('layouts.alert.msg')

      {{-- Content modules --}}
      <div class="row">
        <div class="col-sm-6 col-lg-3">
          <a href="{{ route('admin.posts.index') }}" class="card card-stats card-round text-decoration-none">
            <div class="card-body">
              <div class="row align-items-center">
                <div class="col-icon">
                  <div class="icon-big text-center icon-success bubble-shadow-small">
                    <i class="fas fa-newspaper"></i>
                  </div>
                </div>
                <div class="col col-stats ms-3 ms-sm-0">
                  <div class="numbers">
                    <p class="card-category">Blog posts</p>
                    <h4 class="card-title">{{ $stats['posts'] }}</h4>
                  </div>
                </div>
              </div>
            </div>
          </a>
        </div>

        <div class="col-sm-6 col-lg-3">
          <a href="{{ route('admin.testimonials.index') }}" class="card card-stats card-round text-decoration-none">
            <div class="card-body">
              <div class="row align-items-center">
                <div class="col-icon">
                  <div class="icon-big text-center icon-primary bubble-shadow-small">
                    <i class="fas fa-quote-right"></i>
                  </div>
                </div>
                <div class="col col-stats ms-3 ms-sm-0">
                  <div class="numbers">
                    <p class="card-category">Testimonials</p>
                    <h4 class="card-title">{{ $stats['testimonials'] }}</h4>
                  </div>
                </div>
              </div>
            </div>
          </a>
        </div>

        <div class="col-sm-6 col-lg-3">
          <a href="{{ route('admin.faqs.index') }}" class="card card-stats card-round text-decoration-none">
            <div class="card-body">
              <div class="row align-items-center">
                <div class="col-icon">
                  <div class="icon-big text-center icon-info bubble-shadow-small">
                    <i class="fas fa-question-circle"></i>
                  </div>
                </div>
                <div class="col col-stats ms-3 ms-sm-0">
                  <div class="numbers">
                    <p class="card-category">FAQs</p>
                    <h4 class="card-title">{{ $stats['faqs'] }}</h4>
                  </div>
                </div>
              </div>
            </div>
          </a>
        </div>

        <div class="col-sm-6 col-lg-3">
          <a href="{{ route('admin.centers.index') }}" class="card card-stats card-round text-decoration-none">
            <div class="card-body">
              <div class="row align-items-center">
                <div class="col-icon">
                  <div class="icon-big text-center icon-secondary bubble-shadow-small">
                    <i class="fas fa-map-marker-alt"></i>
                  </div>
                </div>
                <div class="col col-stats ms-3 ms-sm-0">
                  <div class="numbers">
                    <p class="card-category">Directory</p>
                    <h4 class="card-title">{{ $stats['centers'] }}</h4>
                  </div>
                </div>
              </div>
            </div>
          </a>
        </div>
      </div>

      {{-- Site stats --}}
      <div class="row">
        <div class="col-sm-6 col-lg-3">
          <a href="{{ route('admin.messages.index') }}" class="card card-stats card-round text-decoration-none">
            <div class="card-body">
              <div class="row align-items-center">
                <div class="col-icon">
                  <div class="icon-big text-center icon-danger bubble-shadow-small">
                    <i class="fas fa-envelope"></i>
                  </div>
                </div>
                <div class="col col-stats ms-3 ms-sm-0">
                  <div class="numbers">
                    <p class="card-category">Messages</p>
                    <h4 class="card-title">
                      {{ $stats['messages'] }}
                      @if ($stats['unread'])
                        <span class="badge bg-danger ms-1">{{ $stats['unread'] }} new</span>
                      @endif
                    </h4>
                  </div>
                </div>
              </div>
            </div>
          </a>
        </div>

        <div class="col-sm-6 col-lg-3">
          <div class="card card-stats card-round">
            <div class="card-body">
              <div class="row align-items-center">
                <div class="col-icon">
                  <div class="icon-big text-center icon-warning bubble-shadow-small">
                    <i class="fas fa-sliders-h"></i>
                  </div>
                </div>
                <div class="col col-stats ms-3 ms-sm-0">
                  <div class="numbers">
                    <p class="card-category">Settings</p>
                    <h4 class="card-title">{{ $stats['settings'] }}</h4>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="col-sm-6 col-lg-3">
          <div class="card card-stats card-round">
            <div class="card-body">
              <div class="row align-items-center">
                <div class="col-icon">
                  <div class="icon-big text-center icon-primary bubble-shadow-small">
                    <i class="fas fa-file-alt"></i>
                  </div>
                </div>
                <div class="col col-stats ms-3 ms-sm-0">
                  <div class="numbers">
                    <p class="card-category">Pages</p>
                    <h4 class="card-title">{{ $stats['pages'] }}</h4>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="col-sm-6 col-lg-3">
          <div class="card card-stats card-round">
            <div class="card-body">
              <div class="row align-items-center">
                <div class="col-icon">
                  <div class="icon-big text-center icon-secondary bubble-shadow-small">
                    <i class="fas fa-photo-video"></i>
                  </div>
                </div>
                <div class="col col-stats ms-3 ms-sm-0">
                  <div class="numbers">
                    <p class="card-category">Uploaded media</p>
                    <h4 class="card-title">{{ $stats['media'] }}</h4>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      {{-- Recent messages --}}
      <div class="card card-round">
        <div class="card-header d-flex justify-content-between align-items-center">
          <div class="card-title mb-0"><i class="fas fa-envelope me-2 text-primary"></i>Recent contact messages</div>
          <a href="{{ route('admin.messages.index') }}" class="btn btn-sm btn-light btn-round">Open inbox</a>
        </div>
        <div class="card-body p-0">
          <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
              <thead>
                <tr>
                  <th>From</th>
                  <th>Subject</th>
                  <th>Message</th>
                  <th class="text-end">Received</th>
                </tr>
              </thead>
              <tbody>
                @forelse ($recentMessages as $msg)
                  <tr class="{{ $msg->is_read ? '' : 'fw-semibold' }}">
                    <td><a href="{{ route('admin.messages.show', $msg) }}">{{ $msg->name }}</a></td>
                    <td>{{ $msg->subject ?: '—' }}</td>
                    <td class="text-muted small fw-normal">{{ \Illuminate\Support\Str::limit($msg->message, 60) }}</td>
                    <td class="text-end small text-muted fw-normal">{{ $msg->created_at->diffForHumans() }}</td>
                  </tr>
                @empty
                  <tr><td colspan="4" class="text-center text-muted py-4">No messages yet.</td></tr>
                @endforelse
              </tbody>
            </table>
          </div>
        </div>
      </div>

      {{-- Quick actions --}}
      <div class="row">
        <div class="col-md-4">
          <div class="card card-round">
            <div class="card-body text-center">
              <i class="fas fa-newspaper fa-2x text-success mb-2"></i>
              <h5 class="fw-bold">Blog</h5>
              <p class="text-muted small">Write, publish and schedule articles.</p>
              <a href="{{ route('admin.posts.create') }}" class="btn btn-success btn-round btn-sm">New post</a>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card card-round">
            <div class="card-body text-center">
              <i class="fas fa-quote-right fa-2x text-primary mb-2"></i>
              <h5 class="fw-bold">Testimonials</h5>
              <p class="text-muted small">Add and reorder the stories shown on the site.</p>
              <a href="{{ route('admin.testimonials.create') }}" class="btn btn-primary btn-round btn-sm">New testimonial</a>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card card-round">
            <div class="card-body text-center">
              <i class="fas fa-map-marker-alt fa-2x text-info mb-2"></i>
              <h5 class="fw-bold">Centers Directory</h5>
              <p class="text-muted small">Manage centers and NaPro consultant doctors.</p>
              <a href="{{ route('admin.centers.create') }}" class="btn btn-info btn-round btn-sm">New entry</a>
            </div>
          </div>
        </div>
      </div>

      {{-- Site configuration --}}
      <div class="row">
        <div class="col-md-6">
          <div class="card card-round">
            <div class="card-header">
              <div class="card-title"><i class="fas fa-cog me-2 text-primary"></i>Site Configuration &amp; Branding</div>
            </div>
            <div class="card-body">
              <p class="text-muted">
                Update the website name, contact details, the Contact-form receiving email, social profiles,
                global logo and favicon. Changes appear instantly across the whole site.
              </p>
              <a href="{{ route('admin.settings') }}" class="btn btn-primary btn-round">Open Site Settings</a>
            </div>
          </div>
        </div>

        <div class="col-md-6">
          <div class="card card-round">
            <div class="card-header">
              <div class="card-title"><i class="fas fa-file-alt me-2 text-primary"></i>Page Content</div>
            </div>
            <div class="card-body">
              <p class="text-muted">
                Edit the page headings and body copy shown on every public page.
                Testimonials, FAQs, Blog and the Directory are managed in their own sections.
              </p>
              <a href="{{ route('admin.pages') }}" class="btn btn-primary btn-round">Open Page Content</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
