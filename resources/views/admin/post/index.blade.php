@extends('layouts.admin')

@section('title', 'Blog')

@section('content')
  <div class="container">
    <div class="page-inner">
      <div class="page-header d-flex justify-content-between align-items-center flex-wrap gap-2">
        <div>
          <h3 class="fw-bold mb-1">Blog</h3>
          <ul class="breadcrumbs mb-0">
            <li class="nav-home"><a href="{{ url('admin/dashboard') }}"><i class="icon-home"></i></a></li>
            <li class="separator"><i class="icon-arrow-right"></i></li>
            <li class="nav-item"><a href="#">Blog</a></li>
          </ul>
        </div>
        <a href="{{ route('admin.posts.create') }}" class="btn btn-primary btn-round">
          <i class="fa fa-plus me-1"></i> New post
        </a>
      </div>

      @include('layouts.alert.msg')

      <div class="card card-round">
        <div class="card-header">
          <div class="card-title">All posts ({{ $posts->total() }})</div>
        </div>
        <div class="card-body p-0">
          <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
              <thead>
                <tr>
                  <th style="width:70px;">Cover</th>
                  <th>Title</th>
                  <th>Category</th>
                  <th>Author</th>
                  <th style="width:130px;">Published</th>
                  <th style="width:100px;">Status</th>
                  <th style="width:150px;" class="text-end">Actions</th>
                </tr>
              </thead>
              <tbody>
                @forelse ($posts as $post)
                  <tr>
                    <td>
                      <img src="{{ $post->imageUrl() }}" alt="" style="height:42px;width:64px;object-fit:cover;border-radius:8px;">
                    </td>
                    <td>
                      <div class="fw-semibold">{{ $post->title }}</div>
                      <div class="small text-muted">/blog/{{ $post->slug }}</div>
                    </td>
                    <td><span class="badge bg-light text-dark">{{ $post->category ?: '—' }}</span></td>
                    <td class="text-muted small">{{ $post->author ?: '—' }}</td>
                    <td class="small text-muted">{{ $post->dateLabel() ?: '—' }}</td>
                    <td>
                      <form method="POST" action="{{ route('admin.posts.toggle', $post) }}">
                        @csrf
                        @if ($post->is_published)
                          <button class="badge bg-success border-0">Published</button>
                        @else
                          <button class="badge bg-secondary border-0">Draft</button>
                        @endif
                      </form>
                    </td>
                    <td class="text-end">
                      <a href="{{ route('fc.blog.post', $post->slug) }}" target="_blank" class="btn btn-sm btn-outline-primary btn-round" title="View"><i class="fa fa-eye"></i></a>
                      <a href="{{ route('admin.posts.edit', $post) }}" class="btn btn-sm btn-primary btn-round"><i class="fa fa-edit"></i></a>
                      <form method="POST" action="{{ route('admin.posts.destroy', $post) }}" class="d-inline"
                            onsubmit="return confirm('Delete this post?');">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-sm btn-danger btn-round"><i class="fa fa-trash"></i></button>
                      </form>
                    </td>
                  </tr>
                @empty
                  <tr><td colspan="7" class="text-center text-muted py-4">No posts yet.</td></tr>
                @endforelse
              </tbody>
            </table>
          </div>
        </div>
        @if ($posts->hasPages())
          <div class="card-footer">{{ $posts->links() }}</div>
        @endif
      </div>
    </div>
  </div>
@endsection
