<div class="sidebar" data-background-color="dark">
    <div class="sidebar-logo">
      <!-- Logo Header -->
      <div class="logo-header" data-background-color="dark">
        <a href="{{ url('admin/dashboard') }}" class="logo">
          <img src="{{ setting_url('branding.logo', asset('fertilitycare-replica/assets/logo.svg')) }}" alt="navbar brand" class="navbar-brand" height="20" />
        </a>
        <div class="nav-toggle">
          <button class="btn btn-toggle toggle-sidebar">
            <i class="gg-menu-right"></i>
          </button>
          <button class="btn btn-toggle sidenav-toggler">
            <i class="gg-menu-left"></i>
          </button>
        </div>
        <button class="topbar-toggler more">
          <i class="gg-more-vertical-alt"></i>
        </button>
      </div>
      <!-- End Logo Header -->
    </div>
    <div class="sidebar-wrapper scrollbar scrollbar-inner">
      <div class="sidebar-content">
        <ul class="nav nav-secondary">
          <li class="nav-item {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
            <a href="{{ route('admin.dashboard') }}">
              <i class="fas fa-home"></i>
              <p>Dashboard</p>
            </a>
          </li>

          <li class="nav-section">
            <span class="sidebar-mini-icon"><i class="fa fa-ellipsis-h"></i></span>
            <h4 class="text-section">Content</h4>
          </li>

          <li class="nav-item {{ request()->routeIs('admin.pages*') ? 'active' : '' }}">
            <a href="{{ route('admin.pages') }}">
              <i class="fas fa-file-alt"></i>
              <p>Page Content</p>
            </a>
          </li>
          <li class="nav-item {{ request()->routeIs('admin.testimonials*') ? 'active' : '' }}">
            <a href="{{ route('admin.testimonials.index') }}">
              <i class="fas fa-quote-right"></i>
              <p>Testimonials</p>
            </a>
          </li>
          <li class="nav-item {{ request()->routeIs('admin.faqs*') ? 'active' : '' }}">
            <a href="{{ route('admin.faqs.index') }}">
              <i class="fas fa-question-circle"></i>
              <p>FAQs</p>
            </a>
          </li>
          <li class="nav-item {{ request()->routeIs('admin.posts*') ? 'active' : '' }}">
            <a href="{{ route('admin.posts.index') }}">
              <i class="fas fa-newspaper"></i>
              <p>Blog</p>
            </a>
          </li>
          <li class="nav-item {{ request()->routeIs('admin.centers*') ? 'active' : '' }}">
            <a href="{{ route('admin.centers.index') }}">
              <i class="fas fa-map-marker-alt"></i>
              <p>Centers Directory</p>
            </a>
          </li>
          <li class="nav-item {{ request()->routeIs('admin.messages*') ? 'active' : '' }}">
            <a href="{{ route('admin.messages.index') }}">
              <i class="fas fa-envelope"></i>
              <p>
                Messages
                @php $__unread = \App\Models\ContactMessage::query()->unread()->count(); @endphp
                @if ($__unread)
                  <span class="badge badge-danger">{{ $__unread }}</span>
                @endif
              </p>
            </a>
          </li>
          <li class="nav-item {{ request()->routeIs('admin.settings*') ? 'active' : '' }}">
            <a href="{{ route('admin.settings') }}">
              <i class="fas fa-cog"></i>
              <p>Site Settings</p>
            </a>
          </li>

          <li class="nav-section">
            <span class="sidebar-mini-icon"><i class="fa fa-ellipsis-h"></i></span>
            <h4 class="text-section">Account</h4>
          </li>

          <li class="nav-item {{ request()->routeIs('admin.password') ? 'active' : '' }}">
            <a href="{{ route('admin.password') }}">
              <i class="fas fa-key"></i>
              <p>Change Password</p>
            </a>
          </li>

          <li class="nav-item">
            <a href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
              <i class="fas fa-power-off"></i>
              <p>Logout</p>
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
              @csrf
            </form>
          </li>
        </ul>
      </div>
    </div>
  </div>
