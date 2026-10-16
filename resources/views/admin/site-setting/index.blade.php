@extends('layouts.admin')

@section('title', 'Site Settings')

{{--
  Admin ▸ Site Configuration & Branding.

  Sections and fields are grouped here purely for layout; the field list itself
  comes from config/site.php, so adding a setting is a config change only.
--}}
@section('content')
  @php
    $sections = [
        'Identity' => [
            'icon' => 'fas fa-globe',
            'keys' => ['identity.site_name', 'identity.site_tagline', 'identity.site_url', 'identity.meta_description'],
        ],
        'Contact' => [
            'icon' => 'fas fa-address-book',
            'keys' => ['identity.contact_email', 'identity.support_email', 'identity.contact_receiver_email', 'identity.contact_phone', 'identity.support_phone', 'identity.address'],
        ],
        'Social profiles' => [
            'icon' => 'fas fa-share-alt',
            'keys' => ['identity.facebook_url', 'identity.instagram_url', 'identity.youtube_url', 'identity.twitter_url', 'identity.linkedin_url'],
        ],
        'Footer' => [
            'icon' => 'fas fa-shoe-prints',
            'keys' => ['identity.footer_about', 'identity.footer_copyright'],
        ],
        'Logo & favicon' => [
            'icon' => 'far fa-image',
            'keys' => array_keys($branding),
        ],
        'Global content blocks' => [
            'icon' => 'fas fa-layer-group',
            'keys' => array_keys($blocks),
        ],
    ];

    $all = $identity + $branding + $blocks;
  @endphp

  <div class="container">
    <div class="page-inner">
      <div class="page-header">
        <h3 class="fw-bold mb-3">Site Configuration &amp; Branding</h3>
        <ul class="breadcrumbs mb-3">
          <li class="nav-home"><a href="{{ url('admin/dashboard') }}"><i class="icon-home"></i></a></li>
          <li class="separator"><i class="icon-arrow-right"></i></li>
          <li class="nav-item"><a href="#">Settings</a></li>
        </ul>
      </div>

      @include('layouts.alert.msg')

      <form method="POST" action="{{ route('admin.settings.update') }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="row">
          @foreach ($sections as $title => $section)
            <div class="col-lg-6">
              <div class="card card-round">
                <div class="card-header">
                  <div class="card-title"><i class="{{ $section['icon'] }} me-2 text-primary"></i>{{ $title }}</div>
                </div>
                <div class="card-body">
                  @foreach ($section['keys'] as $key)
                    @isset($all[$key])
                      @include('admin.partials.field', ['field' => $all[$key]])
                    @endisset
                  @endforeach
                </div>
              </div>
            </div>
          @endforeach
        </div>

        <div class="d-flex justify-content-end mb-5">
          <button type="submit" class="btn btn-primary btn-round px-4">
            <i class="fa fa-save me-1"></i> Save settings
          </button>
        </div>
      </form>
    </div>
  </div>
@endsection
