{{--
  Shared create/edit form for a testimonial.
  Expects: $testimonial, $action, $method.
--}}
<form method="POST" action="{{ $action }}" enctype="multipart/form-data">
  @csrf
  @if (($method ?? 'POST') !== 'POST') @method($method) @endif

  <div class="row">
    <div class="col-lg-8">
      <div class="card card-round">
        <div class="card-header"><div class="card-title">Testimonial</div></div>
        <div class="card-body">
          @include('admin.partials.crud-field', ['f' => ['name' => 'quote', 'label' => 'Quote', 'type' => 'textarea', 'rows' => 5, 'required' => true, 'value' => $testimonial->quote]])
          <div class="row">
            <div class="col-md-6">
              @include('admin.partials.crud-field', ['f' => ['name' => 'name', 'label' => 'Name', 'required' => true, 'value' => $testimonial->name]])
            </div>
            <div class="col-md-6">
              @include('admin.partials.crud-field', ['f' => ['name' => 'role', 'label' => 'Role / age', 'value' => $testimonial->role, 'placeholder' => 'e.g. 32 years old, Couple']])
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="col-lg-4">
      <div class="card card-round">
        <div class="card-header"><div class="card-title">Details</div></div>
        <div class="card-body">
          @include('admin.partials.crud-field', ['f' => ['name' => 'category', 'label' => 'Category', 'value' => $testimonial->category, 'placeholder' => 'e.g. Diagnosis, Learning']])
          @include('admin.partials.crud-field', ['f' => ['name' => 'location', 'label' => 'Location', 'value' => $testimonial->location]])
          @include('admin.partials.crud-field', ['f' => ['name' => 'rating', 'label' => 'Rating (1–5)', 'type' => 'number', 'value' => $testimonial->rating ?? 5]])
          @include('admin.partials.crud-field', ['f' => ['name' => 'sort_order', 'label' => 'Sort order', 'type' => 'number', 'value' => $testimonial->sort_order]])
          @include('admin.partials.crud-field', ['f' => ['name' => 'is_active', 'label' => 'Visible on the site', 'type' => 'checkbox', 'value' => $testimonial->is_active ?? true]])
        </div>
      </div>

      <div class="card card-round">
        <div class="card-header"><div class="card-title">Portrait (optional)</div></div>
        <div class="card-body">
          @if ($testimonial->imageUrl())
            <img src="{{ $testimonial->imageUrl() }}" alt="" class="mb-3 rounded" style="max-height:120px;">
          @endif
          <input type="file" name="image" accept="image/*" class="form-control @error('image') is-invalid @enderror">
          <div class="form-text">PNG, JPG, WEBP, GIF or SVG · max 4 MB</div>
          @error('image')<div class="invalid-feedback">{{ $message }}</div>@enderror
        </div>
      </div>
    </div>
  </div>

  <div class="d-flex justify-content-end gap-2 mb-5">
    <a href="{{ route('admin.testimonials.index') }}" class="btn btn-light btn-round">Cancel</a>
    <button type="submit" class="btn btn-primary btn-round px-4"><i class="fa fa-save me-1"></i> Save testimonial</button>
  </div>
</form>
