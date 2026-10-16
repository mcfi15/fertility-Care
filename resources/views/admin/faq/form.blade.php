{{--
  Shared create/edit form for an FAQ.
  Expects: $faq, $categories, $action, $method.
--}}
<form method="POST" action="{{ $action }}" enctype="multipart/form-data">
  @csrf
  @if (($method ?? 'POST') !== 'POST') @method($method) @endif

  <div class="row">
    <div class="col-lg-8">
      <div class="card card-round">
        <div class="card-header"><div class="card-title">Question &amp; answer</div></div>
        <div class="card-body">
          @include('admin.partials.crud-field', ['f' => ['name' => 'question', 'label' => 'Question', 'required' => true, 'value' => $faq->question]])
          @include('admin.partials.crud-field', ['f' => ['name' => 'answer', 'label' => 'Answer', 'type' => 'richtext', 'rows' => 10, 'required' => true, 'value' => $faq->answer, 'hint' => 'Rich text — headings, links and lists are supported.']])
        </div>
      </div>
    </div>

    <div class="col-lg-4">
      <div class="card card-round">
        <div class="card-header"><div class="card-title">Settings</div></div>
        <div class="card-body">
          <div class="mb-3">
            <label for="f_category" class="form-label fw-semibold">Category</label>
            <input type="text" id="f_category" name="category" list="faq-categories" value="{{ old('category', $faq->category) }}"
                   class="form-control @error('category') is-invalid @enderror" placeholder="e.g. General">
            <datalist id="faq-categories">
              @foreach ($categories as $category)
                <option value="{{ $category }}"></option>
              @endforeach
            </datalist>
            <div class="form-text">Questions are grouped under this heading on the FAQ page.</div>
            @error('category')<div class="invalid-feedback">{{ $message }}</div>@enderror
          </div>
          @include('admin.partials.crud-field', ['f' => ['name' => 'sort_order', 'label' => 'Sort order', 'type' => 'number', 'value' => $faq->sort_order]])
          @include('admin.partials.crud-field', ['f' => ['name' => 'is_active', 'label' => 'Visible on the site', 'type' => 'checkbox', 'value' => $faq->is_active ?? true]])
        </div>
      </div>
    </div>
  </div>

  <div class="d-flex justify-content-end gap-2 mb-5">
    <a href="{{ route('admin.faqs.index') }}" class="btn btn-light btn-round">Cancel</a>
    <button type="submit" class="btn btn-primary btn-round px-4"><i class="fa fa-save me-1"></i> Save FAQ</button>
  </div>
</form>
