<!-- BEGIN: Header-->
<nav class="header-navbar navbar-expand-md navbar navbar-with-menu navbar-without-dd-arrow fixed-top navbar-semi-light bg-info navbar-shadow">
  <div class="navbar-wrapper">
    <div class="navbar-header">
      <ul class="nav navbar-nav flex-row">
        <li class="nav-item mobile-menu d-md-none mr-auto"><a class="nav-link nav-menu-main menu-toggle hidden-xs" href="#"><i class="ft-menu font-large-1"></i></a></li>
        <li class="nav-item"><a class="navbar-brand" href="index-2.html"><img class="brand-logo" alt="modern admin logo" src="{{ asset('assets/img/logo.png') }}">
          <h3 class="brand-text">Nacoss Portal</h3></a></li>
          <li class="nav-item d-md-none"><a class="nav-link open-navbar-container" data-toggle="collapse" data-target="#navbar-mobile"><i class="la la-ellipsis-v"></i></a></li>
        </ul>
      </div>
      <div class="navbar-container content">
        <div class="collapse navbar-collapse" id="navbar-mobile">
          <ul class="nav navbar-nav mr-auto float-left">

          </ul>
          <ul class="nav navbar-nav float-right">

            <li class="dropdown dropdown-user nav-item"><a class="dropdown-toggle nav-link dropdown-user-link" href="#" data-toggle="dropdown"><span class="mr-1 user-name text-bold-700">{{ Auth::user()->fullname() }}</span><span class="avatar avatar-online"><img src="{{ Auth::user()->profileUpdated() ? asset('uploads/'.Auth::user()->avatar)  :asset('/app-assets/images/portrait/small/avatar.png') }}" alt="avatar"><i></i></span></a>
              <div class="dropdown-menu dropdown-menu-right"><a class="dropdown-item" href="{{ route('dashboard.profile') }}"><i class="ft-user"></i> Edit Profile</a>
                <div class="dropdown-divider"></div><a class="dropdown-item" href="{{ route('logout') }}"  onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="ft-power"></i> Logout</a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                  @csrf
                </form>
              </div>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </nav>
<!-- END: Header-->