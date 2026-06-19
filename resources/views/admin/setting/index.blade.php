@extends('layouts.admin')

@section('title', 'General Settings')

@section('content')

<div class="container">
    <div class="page-inner">
      <div class="page-header">
        <h3 class="fw-bold mb-3">General Settings</h3>
        <ul class="breadcrumbs mb-3">
          <li class="nav-home">
            <a href="{{ url('admin/dashboard') }}">
              <i class="icon-home"></i>
            </a>
          </li>
          <li class="separator">
            <i class="icon-arrow-right"></i>
          </li>
          <li class="nav-item">
            <a href="#">Settings</a>
          </li>
        </ul>
      </div>

      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header">
              <ul class="nav nav-tabs nav-secondary" role="tablist">
                <li class="nav-item">
                  <a class="nav-link active" data-bs-toggle="tab" href="#tabGeneral" role="tab">General</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" data-bs-toggle="tab" href="#tabSEO" role="tab">SEO & Analytics</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" data-bs-toggle="tab" href="#tabAbout" role="tab">Homepage About</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" data-bs-toggle="tab" href="#tabFeatures" role="tab">Features</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" data-bs-toggle="tab" href="#tabFAQ" role="tab">FAQ</a>
                </li>
              </ul>
            </div>

            <form action="{{ url('admin/settings') }}" method="POST" enctype="multipart/form-data">
                @csrf
            <div class="card-body">
                @include('layouts.alert.msg')

                <div class="tab-content">
                    {{-- TAB 1: GENERAL --}}
                    <div class="tab-pane active" id="tabGeneral" role="tabpanel">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="website_name">Website Name</label>
                                    <input type="text" class="form-control" name="website_name" id="website_name" value="{{ $setting->website_name ?? '' }}" />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="page_title">Page Title</label>
                                    <input type="text" class="form-control" name="page_title" id="page_title" value="{{ $setting->page_title ?? '' }}" />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="website_url">Website URL</label>
                                    <input type="text" class="form-control" name="website_url" id="website_url" value="{{ $setting->website_url ?? '' }}" />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="opening_hours">Opening Hours</label>
                                    <input type="text" class="form-control" name="opening_hours" id="opening_hours" value="{{ $setting->opening_hours ?? 'Sun - Friday, 08 am - 09 pm' }}" />
                                </div>
                            </div>
                        </div>
                        <hr>
                        <h5 class="text-primary mb-3">Contact Information</h5>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="email" class="form-control" name="email" id="email" value="{{ $setting->email ?? '' }}" />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="email2">Email 2</label>
                                    <input type="email" class="form-control" name="email2" id="email2" value="{{ $setting->email2 ?? '' }}" />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="phone">Phone</label>
                                    <input type="text" class="form-control" name="phone" id="phone" value="{{ $setting->phone ?? '' }}" />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="phone2">Phone 2</label>
                                    <input type="text" class="form-control" name="phone2" id="phone2" value="{{ $setting->phone2 ?? '' }}" />
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="address">Company Address</label>
                                    <textarea name="address" class="form-control" id="address" rows="2">{{ $setting->address ?? '' }}</textarea>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <h5 class="text-primary mb-3">Statistics</h5>
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="clients">Happy Clients</label>
                                    <input type="number" class="form-control" name="clients" id="clients" value="{{ $setting->clients ?? '' }}" />
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="exp">Years of Experience</label>
                                    <input type="number" class="form-control" name="exp" id="exp" value="{{ $setting->exp ?? '' }}" />
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="emp">Employees</label>
                                    <input type="number" class="form-control" name="emp" id="emp" value="{{ $setting->emp ?? '' }}" />
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="products">Products Sold</label>
                                    <input type="number" class="form-control" name="products" id="products" value="{{ $setting->products ?? '' }}" />
                                </div>
                            </div>
                        </div>
                        <hr>
                        <h5 class="text-primary mb-3">Social Media Links</h5>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="facebook">Facebook URL</label>
                                    <input type="text" class="form-control" name="facebook" id="facebook" value="{{ $setting->facebook ?? '' }}" />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="twitter">Twitter URL</label>
                                    <input type="text" class="form-control" name="twitter" id="twitter" value="{{ $setting->twitter ?? '' }}" />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="instagram">Instagram URL</label>
                                    <input type="text" class="form-control" name="instagram" id="instagram" value="{{ $setting->instagram ?? '' }}" />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="linkedin">LinkedIn URL</label>
                                    <input type="text" class="form-control" name="linkedin" id="linkedin" value="{{ $setting->linkedin ?? '' }}" />
                                </div>
                            </div>
                        </div>
                        <hr>
                        <h5 class="text-primary mb-3">Map Coordinates</h5>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="latitude">Latitude</label>
                                    <input type="text" class="form-control" name="latitude" id="latitude" value="{{ $setting->latitude ?? '' }}" />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="longitude">Longitude</label>
                                    <input type="text" class="form-control" name="longitude" id="longitude" value="{{ $setting->longitude ?? '' }}" />
                                </div>
                            </div>
                        </div>
                        <hr>
                        <h5 class="text-primary mb-3">Site Logos</h5>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group text-center">
                                    @if($setting->logo ?? false)
                                        <img src="{{ asset($setting->logo) }}" alt="Logo" style="max-height:80px;margin-bottom:10px;">
                                        <br>
                                    @endif
                                    <label for="logo">Header Logo</label>
                                    <input type="file" class="form-control" name="logo" id="logo" accept="image/*" />
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group text-center">
                                    @if($setting->footerlogo ?? false)
                                        <img src="{{ asset($setting->footerlogo) }}" alt="Footer Logo" style="max-height:80px;margin-bottom:10px;">
                                        <br>
                                    @endif
                                    <label for="footerlogo">Footer Logo</label>
                                    <input type="file" class="form-control" name="footerlogo" id="footerlogo" accept="image/*" />
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group text-center">
                                    @if($setting->favicon ?? false)
                                        <img src="{{ asset($setting->favicon) }}" alt="Favicon" style="max-height:80px;margin-bottom:10px;">
                                        <br>
                                    @endif
                                    <label for="favicon">Favicon</label>
                                    <input type="file" class="form-control" name="favicon" id="favicon" accept="image/*" />
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- TAB 2: SEO & ANALYTICS --}}
                    <div class="tab-pane" id="tabSEO" role="tabpanel">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="meta_keywords">Meta Keywords (comma separated)</label>
                                    <input type="text" class="form-control" name="meta_keywords" id="meta_keywords" value="{{ $setting->meta_keywords ?? '' }}" />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="meta_description">Meta Description</label>
                                    <textarea name="meta_description" class="form-control" id="meta_description" rows="3">{{ $setting->meta_description ?? '' }}</textarea>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <h5 class="text-primary mb-3">Tracking & Scripts</h5>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="google_analytics">Google Analytics (GA4 Measurement ID)</label>
                                    <input type="text" class="form-control" name="google_analytics" id="google_analytics" value="{{ $setting->google_analytics ?? '' }}" placeholder="G-XXXXXXXXXX" />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="header_scripts">Custom Header Scripts (&lt;/head&gt;)</label>
                                    <textarea name="header_scripts" class="form-control" id="header_scripts" rows="5">{{ $setting->header_scripts ?? '' }}</textarea>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="footer_scripts">Custom Footer Scripts (before &lt;/body&gt;)</label>
                                    <textarea name="footer_scripts" class="form-control" id="footer_scripts" rows="5">{{ $setting->footer_scripts ?? '' }}</textarea>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- TAB 3: HOMEPAGE ABOUT --}}
                    <div class="tab-pane" id="tabAbout" role="tabpanel">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="about_title">About Section Title</label>
                                    <input type="text" class="form-control" name="about_title" id="about_title" value="{{ $setting->about_title ?? 'All-in-One Worksite Health Solution' }}" />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="about_button_text">About Button Text</label>
                                    <input type="text" class="form-control" name="about_button_text" id="about_button_text" value="{{ $setting->about_button_text ?? 'Learn More' }}" />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="about_button_link">About Button Link</label>
                                    <input type="text" class="form-control" name="about_button_link" id="about_button_link" value="{{ $setting->about_button_link ?? '/about' }}" />
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="about_image">About Section Image</label>
                                    @if($setting->about_image ?? false)
                                        <div>
                                            <img src="{{ asset($setting->about_image) }}" alt="About" style="max-height:120px;margin-bottom:10px;">
                                        </div>
                                    @endif
                                    <input type="file" class="form-control" name="about_image" id="about_image" accept="image/*" />
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- TAB 4: FEATURES --}}
                    <div class="tab-pane" id="tabFeatures" role="tabpanel">
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="card border-primary mb-3">
                                    <div class="card-header bg-primary text-white">Feature 1</div>
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label>Icon Class</label>
                                            <input type="text" class="form-control" name="feature1_icon" value="{{ $setting->feature1_icon ?? 'flaticon-medicine' }}" placeholder="flaticon-medicine" />
                                        </div>
                                        <div class="form-group">
                                            <label>Title</label>
                                            <input type="text" class="form-control" name="feature1_title" value="{{ $setting->feature1_title ?? 'Medicine Care' }}" />
                                        </div>
                                        <div class="form-group">
                                            <label>Description</label>
                                            <textarea name="feature1_description" class="form-control" rows="3">{{ $setting->feature1_description ?? '' }}</textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="card border-secondary mb-3">
                                    <div class="card-header bg-secondary text-white">Feature 2</div>
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label>Icon Class</label>
                                            <input type="text" class="form-control" name="feature2_icon" value="{{ $setting->feature2_icon ?? 'flaticon-stethoscope' }}" placeholder="flaticon-stethoscope" />
                                        </div>
                                        <div class="form-group">
                                            <label>Title</label>
                                            <input type="text" class="form-control" name="feature2_title" value="{{ $setting->feature2_title ?? 'Doctors Services' }}" />
                                        </div>
                                        <div class="form-group">
                                            <label>Description</label>
                                            <textarea name="feature2_description" class="form-control" rows="3">{{ $setting->feature2_description ?? '' }}</textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="card border-success mb-3">
                                    <div class="card-header bg-success text-white">Feature 3</div>
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label>Icon Class</label>
                                            <input type="text" class="form-control" name="feature3_icon" value="{{ $setting->feature3_icon ?? 'flaticon-flask' }}" placeholder="flaticon-flask" />
                                        </div>
                                        <div class="form-group">
                                            <label>Title</label>
                                            <input type="text" class="form-control" name="feature3_title" value="{{ $setting->feature3_title ?? 'Medical Equipment' }}" />
                                        </div>
                                        <div class="form-group">
                                            <label>Description</label>
                                            <textarea name="feature3_description" class="form-control" rows="3">{{ $setting->feature3_description ?? '' }}</textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- TAB 5: FAQ --}}
                    <div class="tab-pane" id="tabFAQ" role="tabpanel">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="faq_heading">FAQ Section Heading</label>
                                    <input type="text" class="form-control" name="faq_heading" id="faq_heading" value="{{ $setting->faq_heading ?? 'Frequently Asked Questions' }}" />
                                </div>
                            </div>
                        </div>
                        <hr>
                        <p class="text-muted">Enter FAQ items as JSON. Format: [{"question": "...", "answer": "..."}]</p>
                        <div class="form-group">
                            <label for="faq_items">FAQ Items (JSON)</label>
                            <textarea name="faq_items" class="form-control" id="faq_items" rows="10">{{ $setting->faq_items ?? '' }}</textarea>
                        </div>
                    </div>

                </div>
            </div>
            <div class="card-action">
                <button type="submit" class="btn btn-success">Save Settings</button>
            </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection