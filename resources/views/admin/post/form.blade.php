{{--
  Shared create/edit form for a blog post.
  Expects: $post, $action, $method.
--}}
<form method="POST" action="{{ $action }}" enctype="multipart/form-data">
  @csrf
  @if (($method ?? 'POST') !== 'POST') @method($method) @endif

  <div class="row">
    <div class="col-lg-8">
      <div class="card card-round">
        <div class="card-header"><div class="card-title">Post</div></div>
        <div class="card-body">
          @include('admin.partials.crud-field', ['f' => ['name' => 'title', 'label' => 'Title', 'required' => true, 'value' => $post->title]])
          @include('admin.partials.crud-field', ['f' => ['name' => 'slug', 'label' => 'Slug (URL)', 'value' => $post->slug, 'hint' => 'Leave blank to generate from the title. Lowercase letters, numbers and hyphens only.']])
          @include('admin.partials.crud-field', ['f' => ['name' => 'excerpt', 'label' => 'Excerpt / summary', 'type' => 'textarea', 'rows' => 3, 'value' => $post->excerpt]])
          @include('admin.partials.crud-field', ['f' => ['name' => 'body', 'label' => 'Body', 'type' => 'richtext', 'rows' => 14, 'required' => true, 'value' => $post->body, 'hint' => 'Rich text — headings, lists, links and quotes are supported.']])
        </div>
      </div>
    </div>

    <div class="col-lg-4">
      <div class="card card-round">
        <div class="card-header"><div class="card-title">Details</div></div>
        <div class="card-body">
          @include('admin.partials.crud-field', ['f' => ['name' => 'category', 'label' => 'Category', 'value' => $post->category, 'placeholder' => 'e.g. Clinical, Education']])
          @include('admin.partials.crud-field', ['f' => ['name' => 'author', 'label' => 'Author', 'value' => $post->author]])
          @include('admin.partials.crud-field', ['f' => ['name' => 'published_at', 'label' => 'Publication date', 'type' => 'datetime', 'value' => $post->published_at?->format('Y-m-d H:i')]])
          @include('admin.partials.crud-field', ['f' => ['name' => 'is_published', 'label' => 'Published', 'type' => 'checkbox', 'value' => $post->is_published ?? true]])
        </div>
      </div>

      <div class="card card-round">
        <div class="card-header"><div class="card-title">Featured image</div></div>
        <div class="card-body">
          @if ($post->imageUrl())
            <img src="{{ $post->imageUrl() }}" alt="" class="mb-3 rounded w-100" style="max-height:160px;object-fit:cover;">
          @endif
          <input type="file" name="featured_image" accept="image/*" class="form-control @error('featured_image') is-invalid @enderror">
          <div class="form-text">PNG, JPG, WEBP, GIF or SVG · max 4 MB</div>
          @error('featured_image')<div class="invalid-feedback">{{ $message }}</div>@enderror
        </div>
      </div>
    </div>
  </div>

  <div class="d-flex justify-content-end gap-2 mb-5">
    <a href="{{ route('admin.posts.index') }}" class="btn btn-light btn-round">Cancel</a>
    <button type="submit" class="btn btn-primary btn-round px-4"><i class="fa fa-save me-1"></i> Save post</button>
  </div>
</form>
