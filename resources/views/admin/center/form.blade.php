{{--
  Shared create/edit form for a directory entry (center or doctor).
  Expects: $center, $types, $action, $method.
--}}
<form method="POST" action="{{ $action }}" enctype="multipart/form-data">
  @csrf
  @if (($method ?? 'POST') !== 'POST') @method($method) @endif

  <div class="row">
    <div class="col-lg-8">
      <div class="card card-round">
        <div class="card-header"><div class="card-title">Location</div></div>
        <div class="card-body">
          @include('admin.partials.crud-field', ['f' => ['name' => 'name', 'label' => 'Name', 'required' => true, 'value' => $center->name]])
          @include('admin.partials.crud-field', ['f' => ['name' => 'address', 'label' => 'Address', 'value' => $center->address]])

          <div class="row">
            <div class="col-md-6">
              @include('admin.partials.crud-field', ['f' => ['name' => 'country', 'label' => 'Country', 'required' => true, 'value' => $center->country]])
            </div>
            <div class="col-md-6">
              @include('admin.partials.crud-field', ['f' => ['name' => 'state', 'label' => 'State / Region', 'value' => $center->state]])
            </div>
            <div class="col-md-6">
              @include('admin.partials.crud-field', ['f' => ['name' => 'city', 'label' => 'City', 'value' => $center->city]])
            </div>
            <div class="col-md-6">
              @include('admin.partials.crud-field', ['f' => ['name' => 'hours', 'label' => 'Operating hours', 'value' => $center->hours, 'placeholder' => 'e.g. Mon–Fri 9:00–18:00']])
            </div>
          </div>
        </div>
      </div>

      <div class="card card-round">
        <div class="card-header"><div class="card-title">Contact</div></div>
        <div class="card-body">
          <div class="row">
            <div class="col-md-6">
              @include('admin.partials.crud-field', ['f' => ['name' => 'phone', 'label' => 'Phone', 'value' => $center->phone]])
            </div>
            <div class="col-md-6">
              @include('admin.partials.crud-field', ['f' => ['name' => 'email', 'label' => 'Email', 'type' => 'email', 'value' => $center->email]])
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="col-lg-4">
      <div class="card card-round">
        <div class="card-header"><div class="card-title">Settings</div></div>
        <div class="card-body">
          @include('admin.partials.crud-field', ['f' => ['name' => 'type', 'label' => 'Entry type', 'type' => 'select', 'options' => $types, 'value' => $center->type ?? 'center']])
          @include('admin.partials.crud-field', ['f' => ['name' => 'specialty', 'label' => 'Specialty / services', 'value' => $center->specialty, 'hint' => 'Doctors: focus area. Centers: services offered.']])
          @include('admin.partials.crud-field', ['f' => ['name' => 'sort_order', 'label' => 'Sort order', 'type' => 'number', 'value' => $center->sort_order]])
          @include('admin.partials.crud-field', ['f' => ['name' => 'is_active', 'label' => 'Visible on the site', 'type' => 'checkbox', 'value' => $center->is_active ?? true]])
        </div>
      </div>
    </div>
  </div>

  <div class="d-flex justify-content-end gap-2 mb-5">
    <a href="{{ route('admin.centers.index', ['type' => $center->type ?? 'center']) }}" class="btn btn-light btn-round">Cancel</a>
    <button type="submit" class="btn btn-primary btn-round px-4"><i class="fa fa-save me-1"></i> Save entry</button>
  </div>
</form>
