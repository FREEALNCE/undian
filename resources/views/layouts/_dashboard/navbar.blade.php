<nav class="sb-topnav navbar navbar-expand ">
    <!-- <button class="btn btn-link btn-sm order-1 order-lg-0" id="sidebarToggle" href="#">
        <i class="fas fa-bars" style="width: 40; height: 40;"></i>
    </button>
    <a class="navbar-brand" href="#">
        <img src="{{ asset('img/bz-navbar.png') }}" alt="" width="200" height="50">
    </a> -->

    <ul class="navbar-nav ml-auto">

        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" id="userDropdown" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">

                <!-- show username -->
                {{ Auth::user()->name }}

            </a>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown" style="text-align: center; border-radius: 10px">
                <img src="{{ asset('img/user.png') }}" alt="" style="width: 30%; border-radius: 50px;">
                <br>
                {{ Auth::user()->name }}
                <br>
                <span style="font-size: 11px">{{ Auth::user()->roles->first()->name }}</span>

                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="{{ route('profile.edit') }}">
                    Edit Profile
                </a>
                <a class="dropdown-item" href="{{ route('password.edit') }}">
                    Change Password
                </a>
                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                    LogOut
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </div>
        </li>
    </ul>
</nav>