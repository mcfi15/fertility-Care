{{--
  Reusable CRUD form field for the admin content modules.
  Pass $f = [
    'name' => 'title', 'label' => 'Title',
    'type' => 'text|email|number|date|datetime|textarea|richtext|select|checkbox',
    'value' => '…', 'required' => true, 'options' => ['k'=>'v'], 'hint' => '…',
    'rows' => 4, 'placeholder' => '…',
  ]
--}}
@php
  $name  = $f['name'];
  $type  = $f['type'] ?? 'text';
  $id    = 'f_' . str_replace(['[', ']', '.', '-'], '_', $name);
  $value = old($name, $f['value'] ?? '');
  $req   = ! empty($f['required']);
  $cls   = 'form-control' . (($type === 'richtext' || $type === 'textarea') ? '' : '') . ($errors->has($name) ? ' is-invalid' : '');
@endphp

@if ($type === 'checkbox')
  <div class="form-check form-switch mb-4">
    <input type="hidden" name="{{ $name }}" value="0">
    <input type="checkbox" class="form-check-input" id="{{ $id }}" name="{{ $name }}" value="1" @checked($value)>
    <label class="form-check-label fw-semibold" for="{{ $id }}">{{ $f['label'] }}</label>
    @if (! empty($f['hint']))<div class="form-text">{{ $f['hint'] }}</div>@endif
    @error($name)<div class="text-danger small">{{ $message }}</div>@enderror
  </div>
@else
  <div class="mb-3">
    <label for="{{ $id }}" class="form-label fw-semibold">
      {{ $f['label'] }} @if ($req)<span class="text-danger">*</span>@endif
    </label>

    @if ($type === 'select')
      <select id="{{ $id }}" name="{{ $name }}" class="{{ $cls }}">
        @foreach ($f['options'] ?? [] as $optVal => $optLabel)
          <option value="{{ $optVal }}" @selected((string) $value === (string) $optVal)>{{ $optLabel }}</option>
        @endforeach
      </select>
    @elseif ($type === 'richtext')
      <textarea id="{{ $id }}" name="{{ $name }}" rows="{{ $f['rows'] ?? 10 }}" class="form-control rich-editor {{ $errors->has($name) ? 'is-invalid' : '' }}">{{ $value }}</textarea>
    @elseif ($type === 'textarea')
      <textarea id="{{ $id }}" name="{{ $name }}" rows="{{ $f['rows'] ?? 4 }}" class="{{ $cls }}">{{ $value }}</textarea>
    @else
      <input type="{{ $type === 'datetime' ? 'datetime-local' : $type }}" id="{{ $id }}" name="{{ $name }}"
             value="{{ $type === 'datetime' && $value ? \Illuminate\Support\Str::of($value)->replace(' ', 'T')->substr(0, 16) : $value }}"
             @if (! empty($f['placeholder'])) placeholder="{{ $f['placeholder'] }}" @endif
             @if ($req) required @endif
             class="{{ $cls }}">
    @endif

    @if (! empty($f['hint']))<div class="form-text">{{ $f['hint'] }}</div>@endif
    @error($name)<div class="invalid-feedback">{{ $message }}</div>@enderror
  </div>
@endif
