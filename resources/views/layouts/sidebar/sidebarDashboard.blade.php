<nav class="navbar navbar-vertical fixed-left navbar-expand-md navbar-light bg-white" id="sidenav-main">
    <div class="container-fluid">
      <!-- Toggler -->
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#sidenav-collapse-main" aria-controls="sidenav-main" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <!-- Brand -->
      <a class="navbar-brand pt-0" href="{{url('home')}}">
        <img src="{{asset('template/assets/img/brand/blue.png')}}" class="navbar-brand-img" alt="...">
      </a>
      <!-- User -->
      <ul class="nav align-items-center d-md-none">
        <li class="nav-item dropdown">
          <a class="nav-link font-italic" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <div class="media align-items-center">
              <span class="avatar avatar-sm rounded-circle">
                <img alt="Image placeholder" src="{{asset('template/assets/img/brand/favicon.png')}}">
              </span>
            </div>
          </a>
        </li>
      </ul>
      <!-- Collapse -->
      <div class="collapse navbar-collapse" id="sidenav-collapse-main">
        <!-- Collapse header -->
        <div class="navbar-collapse-header d-md-none">
          <div class="row">
            <div class="col-6 collapse-brand">
              <a href="{{url('home')}}">
                <img src="{{asset('template/assets/img/brand/favicon.png')}}">
              </a>
            </div>
            <div class="col-6 collapse-close">
              <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#sidenav-collapse-main" aria-controls="sidenav-main" aria-expanded="false" aria-label="Toggle sidenav">
                <span></span>
                <span></span>
              </button>
            </div>
          </div>
        </div>
        <!-- Navigation -->
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link font-italic" href="{{url('home')}}">
              <i class="ni ni-tv-2 text-primary"></i> Dashboard
            </a>
          </li>
          @if(Auth::user()->hasRole(0))
            @include('layouts.sidebar.contentA')
          @elseif(Auth::user()->hasRole(1) && !isset($mater_user))
            @include('layouts.sidebar.contentB')
          @elseif(Auth::user()->hasRole(2))
            @include('layouts.sidebar.contentC')
          @endif
           <li class="nav-item">
            <a class="nav-link font-italic" href="{{ route('profile-index') }}">
              <i class="ni ni-single-02 text-yellow"></i> User profile
            </a>
          </li>
          <li class="nav-item"> 
              <a href="{{route('logout')}}"  onclick="event.preventDefault(); document.getElementById('logout-form').submit();"  class="nav-link font-italic">
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                  {{ csrf_field() }}
                </form>
                  <i class="ni ni-user-run text-cyan"></i>
                  <span>Logout</span>
              </a>
          </li>
        </ul>
      </div>
    </div>
  </nav>