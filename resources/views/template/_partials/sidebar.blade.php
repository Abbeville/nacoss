

<div class="main-menu menu-fixed menu-light menu-accordion    menu-shadow " data-scroll-to-active="true">
  <div class="main-menu-content">
    <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
      <li class="active"><a href="{{ route('dashboard.home') }}"><i style="font-size: 20px;">🏦</i><span class="menu-title">Dashboard</span></a>
      </li>
     
<li class=" nav-item"><a href="{{ route('dashboard.profile') }}"><i style="font-size: 20px;">🙍</i><span class="menu-title">Profile</span></a>

@if(Auth::user()->type == config('type.roles.member'))

<li class=" nav-item"><a href="{{ route('dashboard.transactions') }}"><i style="font-size: 20px;">💵</i><span class="menu-title">Transaction History</span></a>
</li>

@endif

@if(Auth::user()->type != config('type.roles.member'))

<li class=" nav-item"><a href="#"><i style="font-size: 20px;">🙍</i><span class="menu-title">Members</span></a>
    <ul class="menu-content">
      <li><a class="menu-item" href="{{ route('member.all') }}"><i></i><span>Registered </span></a>
      </li>
      <li><a class="menu-item" href="{{ route('member.paid') }}"><i></i><span>Paid Members</span></a>
      </li>
      @if(Auth::user()->type == config('type.roles.soft_dir'))
        <li><a class="menu-item" href="{{ route('member.verified') }}"><i></i><span>Verified Profile</span></a>
        </li>
      @endif
  </ul>
</li>

@endif

</ul>
</div>
</div>

<!-- END: Main Menu