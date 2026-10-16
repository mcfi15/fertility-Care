{{--
  A single dynamic settings field. Expects:
    $field = [
      'label' => '…', 'type' => 'text|textarea|image',
      'input' => 'identity[site_name]',  // form input name (array notation)
      'name'  => 'identity.site_name',   // validation key (dot notation)
      'value' => '…', 'url' => '…',      // url only for image fields
      'extensions' => [...], 'max_kb' => 2048,
    ]
--}}
@php
  $type  = $field['type'] ?? 'text';
  $input = $field['input'];
  $key   = $field['name'];
  $value = old($key, $field['value'] ?? '');
  $extList = $field['extensions'] ?? ['png', 'jpg', 'jpeg', 'webp', 'svg', 'ico'];
  $exts  = implode(', ', $extList);
  $isVideo = in_array('mp4', array_map('strtolower', $extList), true);
  $accept  = $isVideo ? 'video/mp4,.mp4' : 'image/*,.ico,.svg';
  $currentUrl = $field['url'] ?? '';
  $currentIsVideo = $currentUrl !== '' && str_ends_with(strtolower(parse_url($currentUrl, PHP_URL_PATH) ?? ''), '.mp4');
@endphp

<div class="mb-3">
  <label for="{{ $input }}" class="form-label fw-semibold">{{ $field['label'] ?? $key }}</label>

  @if ($type === 'textarea')
    <textarea id="{{ $input }}" name="{{ $input }}" rows="3"
      class="form-control @error($key) is-invalid @enderror">{{ $value }}</textarea>
  @elseif ($type === 'image')
    <div class="d-flex align-items-center gap-3">
      @if (! empty($currentUrl))
        @if ($currentIsVideo)
          <video src="{{ $currentUrl }}" muted playsinline style="height:44px;width:auto;padding:4px;border:1px solid #e6e8ee;border-radius:8px;background:#fff;"></video>
        @else
          <img src="{{ $currentUrl }}" alt="" style="height:44px;width:auto;padding:4px;border:1px solid #e6e8ee;border-radius:8px;background:#fff;">
        @endif
      @endif
      <input type="file" id="{{ $input }}" name="{{ $input }}" accept="{{ $accept }}"
        class="form-control @error($key) is-invalid @enderror">
    </div>
    <div class="form-text">Allowed: {{ $exts }} · max {{ $field['max_kb'] ?? 2048 }} KB</div>
  @else
    <input type="text" id="{{ $input }}" name="{{ $input }}" value="{{ $value }}"
      class="form-control @error($key) is-invalid @enderror">
  @endif

  @error($key)
    <div class="invalid-feedback">{{ $message }}</div>
  @enderror
</div>
