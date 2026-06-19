<div class="sidebar" data-background-color="dark">
    <div class="sidebar-logo">
      <!-- Logo Header -->
      <div class="logo-header" data-background-color="dark">
        <a href="index.html" class="logo">
          <img src="{{ asset($appSetting->logo) }}" alt="navbar brand" class="navbar-brand" height="20" />
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
          <li class="nav-item active">
            <a href="{{ url('admin/dashboard') }}" >
              <i class="fas fa-home"></i>
              <p>Dashboard</p>
              
            </a>
            
          </li>
         
          {{-- <li class="nav-item">
            <a href="{{ url('admin/offers') }}">
              <i class="fas fa-table"></i>
              <p>Offers</p>
            </a>
            
          </li> --}}
          {{-- <li class="nav-item">
            <a href="{{ url('admin/orders') }}">
              <i class="fab fa-first-order"></i>
              <p>Orders</p>
            </a>
            
          </li> --}}
          <li class="nav-item">
            <a href="{{ url('admin/appointments') }}">
              <i class="fas fa-calendar-check"></i>
              <p>Appointments</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ url('admin/applications') }}">
              <i class="fas fa-file-alt"></i>
              <p>Applications</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ url('admin/category') }}">
              <i class="fas fa-list-alt"></i>
              <p>Categories</p>
            </a>
            
          </li>
          <li class="nav-item">
            <a href="{{ url('admin/testimonials') }}">
              <i class="fab fa-product-hunt"></i>
              <p>Testominials</p>
            </a>
            
          </li>
          {{-- <li class="nav-item">
            <a href="{{ url('admin/jobs') }}">
              <i class="fab fa-product-hunt"></i>
              <p>Jobs</p>
            </a>
            
          </li> --}}
          <li class="nav-item">
            <a href="{{ url('admin/products') }}">
              <i class="fab fa-product-hunt"></i>
              <p>Products</p>
            </a>
            
          </li>
          <li class="nav-item">
            <a href="{{ url('admin/subscribers') }}">
              <i class="fab fa-product-hunt"></i>
              <p>Subscribers</p>
            </a>
          </li>

          <li class="nav-item">
            <a href="{{ url('admin/faqs') }}">
              <i class="fas fa-question-circle"></i>
              <p>FAQs</p>
            </a>
          </li>

          <li class="nav-item">
            <a href="{{ url('admin/about') }}">
              <i class="fab fa-product-hunt"></i>
              <p>About</p>
            </a>
          </li>

          <li class="nav-item">
            <a href="{{ url('admin/board') }}">
              <i class="fab fa-product-hunt"></i>
              <p>Board Members</p>
            </a>
          </li>

          <li class="nav-item">
            <a href="{{ url('admin/sliders') }}">
              <i class="fas fa-images"></i>
              <p>Slider</p>
            </a>
            
          </li>
          <li class="nav-item">
            <a href="{{ url('admin/settings') }}">
              <i class="fas fa-cog"></i>
              <p>Settings</p>
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