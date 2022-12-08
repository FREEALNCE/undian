<div class="logo-details" style="display: flex;">

    <div class="img-box">
        <img src="{{ asset('img/icon-clevio.png') }}" alt="">
    </div>
    <a href="{{ route('dashboard.index') }}" class="{{ set_active(['dashboard.index']) }}">
        <div class="logo_name">CMS Clevio</div>
    </a>
    <i class='bx bx-menu' id="btn"></i>
</div>

<ul class="nav-list">

    <hr style="margin-top:0.5rem; margin-bottom:0.5rem;">
    <span class="ket">Data</span><br>
    <!-- @canany(['Manage Cities', 'Manage Regions'])
    <li>
        <div class="iocn-link">
            <a href="#" class="{{ set_active(['city.index', 'city.show', 'city.edit', 'city.create', 'region.index', 'region.show', 'region.edit', 'region.create']) }}">
                <i class='bx bx-map'></i>
                <span class="link_name">Location</span>
                <i class='bx bxs-chevron-down arrow' style="margin-left: 0px;"></i>
            </a>
            <span class="tooltip">Location</span>
        </div>
        <ul class="sub-menu">
            @can('Manage Cities')
            <li><a href="{{ route('city.index') }}" class="{{ set_active(['city.index', 'city.show', 'city.edit', 'city.create']) }}">City</a></li>
            @endcan
            @can('Manage Regions')
            <li><a href="{{ route('region.index') }}" class="{{ set_active(['region.index', 'region.show', 'region.edit', 'region.create']) }}">Region</a></li>
            @endcan
        </ul>
    </li>
    @endcanany -->

    <li>
        <div class="iocn-link">
            <a href="#" class="">
                <i class='bx bx-receipt'></i>
                <span class="link_name">Portfolio</span>
                <i class='bx bxs-chevron-down arrow' style="margin-left: 40px;"></i>
            </a>
            <span class="tooltip">Portfolio</span>
        </div>
        <ul class="sub-menu">

            <li><a href="{{ route('event-portfolio.index') }}" class="{{ set_active(['event-portfolio.index', 'event-portfolio.show', 'event-portfolio.edit', 'event-portfolio.create']) }}">Event Portfolio</a></li>

            <li><a href="{{ route('project-portfolio.index') }}" class="{{ set_active(['project-portfolio.index', 'project-portfolio.show', 'project-portfolio.edit', 'project-portfolio.create']) }}">Project Portfolio</a></li>

        </ul>
    </li>

    @can('Manage Metas')
    <li>
        <a href="{{ route('metas.index') }}" class="{{ set_active(['metas.index', 'metas.show', 'metas.edit', 'metas.create']) }}">
            <i class='bx bx-book'></i>
            <span class="links_name">Meta Pages</span>
        </a>
        <span class="tooltip">Meta Pages</span>
    </li>
    @endcan

    <hr style="margin-top:0.5rem; margin-bottom:0.5rem;">
    <span class="ket">Programs</span><br>

    <li>
        <a href="{{ route('programs.index') }}" class="{{ set_active(['programs.index', 'programs.show', 'programs.edit', 'programs.create']) }}">
            <i class='bx bx-spa'></i>
            <span class="links_name">Program</span>
        </a>
        <span class="tooltip">Program</span>
    </li>

    <li>
        <div class="iocn-link">
            <a href="#" class="#">
                <i class='bx bxs-school'></i>
                <span class="link_name">Class</span>
                <i class='bx bxs-chevron-down arrow' style="margin-left: 62px;"></i>
            </a>
            <span class="tooltip">Class</span>
        </div>
        <ul class="sub-menu">

            <li><a href="{{ route('classes.index') }}" class="{{ set_active(['classes.index', 'classes.show', 'classes.edit', 'classes.create']) }}">Clevio Class</a></li>

            <li><a href="{{ route('categories-class.index') }}" class="{{ set_active(['categories-class.index', 'categories-class.show', 'categories-class.edit', 'categories-class.create']) }}">Class Category</a></li>

        </ul>
    </li>

    <li>
        <a href="{{ route('events.index') }}" class="{{ set_active(['events.index', 'events.show', 'events.edit', 'events.create']) }}">
            <i class='bx bx-calendar-event'></i>
            <span class="links_name">Event</span>
        </a>
        <span class="tooltip">Event</span>
    </li>

    <hr style="margin-top:0.5rem; margin-bottom:0.5rem;">
    <span class="ket">Content</span>

    @can('Manage Banners')
    <li>
        <a href="{{ route('banners.index') }}" class="{{ set_active(['banners.index', 'banners.show', 'banners.edit', 'banners.create']) }}">
            <i class='bx bx-flag'></i>
            <span class="links_name">Banner</span>
        </a>
        <span class="tooltip">Banner</span>
    </li>
    @endcan

    @can('Manage Promos')
    <!-- <li>
        <div class="iocn-link">
            <a href="#" class="">
                <i class='bx bx-book-open'></i>
                <span class="link_name">Promos</span>
                <i class='bx bxs-chevron-down arrow' style="margin-left: 5px;"></i>
            </a>
            <span class="tooltip">Promos</span>
        </div>
        <ul class="sub-menu">

            <li><a href="{{ route('team.index') }}" class="">Promo</a></li>

            <li><a href="{{ route('categories-team.index') }}" class="">Programs</a></li>

        </ul>
    </li> -->
    @endcan

    @canany(['Manage Posts', 'Manage Post Categories', 'Manage Tags'])
    <li>
        <div class="iocn-link">

            <a href="#" class="{{ set_active(['categories-post.index', 'categories-post.show', 'categories-post.edit', 'categories-post.create', 'tags.index', 'tags.show', 'tags.edit', 'tags.create', 'posts.index', 'posts.show', 'posts.edit', 'posts.create']) }}">
                <i class='bx bx-news'></i>
                <span class="link_name">Post</span>
                <i class='bx bxs-chevron-down arrow' style="margin-left: 65px;"></i>
            </a>
            <span class="tooltip">Post</span>
        </div>
        <ul class="sub-menu">
            @can('Manage Posts')
            <li><a href="{{ route('posts.index') }}" class="{{ set_active(['posts.index', 'posts.show', 'posts.edit', 'posts.create']) }}">Post Content</a></li>
            @endcan

            @can('Manage Post Categories')
            <li><a href="{{ route('categories-post.index') }}" class="{{ set_active(['categories-post.index', 'categories-post.show', 'categories-post.edit', 'categories-post.create']) }}">Category</a></li>
            @endcan

            @can('Manage Tags')
            <li><a href="{{ route('tags.index') }}" class="{{ set_active(['tags.index', 'tags.show', 'tags.edit', 'tags.create']) }}">Tag</a></li>
            @endcanany
        </ul>
    </li>
    @endcanany

    @canany(['Manage Galleries', 'Manage Gallery Categories'])
    <!-- <li>
        <div class="iocn-link">
            <a href="#" class="{{ set_active(['categories-gallery.index', 'categories-gallery.show', 'categories-gallery.edit', 'categories-gallery.create', 'gallery.index', 'gallery.show', 'gallery.edit', 'gallery.create']) }}">
                <i class='bx bx-images'></i>
                <span class="link_name">Gallery</span>
                <i class='bx bxs-chevron-down arrow' style="margin-left: 8px;"></i>
            </a>
            <span class="tooltip">Gallery</span>
        </div>
        <ul class="sub-menu">
            @can('Manage Galleries')
            <li><a href="{{ route('gallery.index') }}" class="{{ set_active(['gallery.index', 'gallery.show', 'gallery.edit', 'gallery.create']) }}">Gallery Content</a></li>
            @endcanany

            @can('Manage Gallery Categories')
            <li><a href="{{ route('categories-gallery.index') }}" class="{{ set_active(['categories-gallery.index', 'categories-gallery.show', 'categories-gallery.edit', 'categories-gallery.create']) }}">Category</a></li>
            @endcanany
        </ul>
    </li> -->
    @endcanany

    @can('Manage Partners')
    <li>
        <a href="{{ route('mitra.index') }}" class="{{ set_active(['mitra.index', 'mitra.show', 'mitra.edit', 'mitra.create']) }}">
            <i class='bx bx-link'></i>
            <span class="links_name">Partners</span>
        </a>
        <span class="tooltip">Partners</span>
    </li>
    @endcan

    <li>
        <a href="{{ route('testimonies.index') }}" class="{{ set_active(['testimonies.index', 'testimonies.show', 'testimonies.edit', 'testimonies.create']) }}">
            <i class='bx bx-star'></i>
            <span class="links_name">Testimony</span>
        </a>
        <span class="tooltip">Testimony</span>
    </li>

    <li>
        <a href="{{ route('faq.index') }}" class="{{ set_active(['faq.index', 'faq.show', 'faq.edit', 'faq.create']) }}">
            <i class='bx bx-question-mark'></i>
            <span class="links_name">FAQ</span>
        </a>
        <span class="tooltip">FAQ</span>
    </li>

    <li>
        <a href="{{ route('team.index') }}" class="{{ set_active(['team.index', 'team.show', 'team.edit', 'team.create']) }}">
            <i class='bx bxs-user'></i>
            <span class="links_name">Team</span>
        </a>
        <span class="tooltip">Team</span>
    </li>

    <hr style="margin-top:0.5rem; margin-bottom:0.5rem;">
    <span class="ket">Media</span>
    <li>
        <a href="{{ route('filemanager.index') }}" class="{{ set_active(['filemanager.index']) }}">
            <i class='bx bx-box'></i>
            <span class="links_name">Media Library</span>
        </a>
        <span class="tooltip">Media Library</span>
    </li>

    <hr style="margin-top:0.5rem; margin-bottom:0.5rem;">
    <span class="ket">Setting</span>
    @canany(['Manage Profiles', 'Manage Passwords'])
    <li>
        <div class="iocn-link">
            <a href="#">
                <i class='bx bx-edit'></i>
                <span class="link_name">Profile</span>
                <i class='bx bxs-chevron-down arrow' style="margin-left: 51px;"></i>
            </a>
            <span class="tooltip">Profile</span>
        </div>
        <ul class="sub-menu">
            @can('Manage Profiles')
            <li><a href="{{ route('profile.edit') }}">Edit Profile</a></li>
            @endcan

            @can('Manage Passwords')
            <li><a href="{{ route('password.edit') }}">Change Password</a></li>
            @endcan
        </ul>
    </li>
    @endcanany

    @canany(['Manage Roles', 'Manage Users'])
    <li class="credentials">
        <div class="iocn-link">
            <a href="#" class="{{ set_active(['roles.index', 'roles.show', 'roles.edit', 'roles.create', 'users.index', 'users.show', 'users.edit', 'users.create']) }}">
                <i class='bx bxs-user-account'></i>
                <span class="link_name">Credentials</span>
                <i class='bx bxs-chevron-down arrow' style="margin-left: 23px;"></i>
            </a>
            <span class="tooltip">Credentials</span>
        </div>
        <ul class="sub-menu">

            <li><a href="{{ route('roles.index') }}" class="{{ set_active(['roles.index', 'roles.show', 'roles.edit', 'roles.create']) }}">Roles</a></li>

            <li><a href="{{ route('users.index') }}" class="{{ set_active(['users.index', 'users.show', 'users.edit', 'users.create']) }}">Add User</a></li>

        </ul>
    </li>
    @endcanany

    <li>
        <div class="iocn-link">
            <a href="#">
                <i class='bx bx-cog'></i>
                <span class="link_name" style="margin-right: 112px;">Website</span>
                <i class='bx bxs-chevron-down arrow'></i>
            </a>
            <span class="tooltip">Website</span>
        </div>
        <ul class="sub-menu">

            <li><a href="{{ route('home-caption.index') }}" class="{{set_active(['home-caption.index'])}}">Home Caption</a></li>

            <li><a href="{{ route('site-identity.index') }}" class="{{set_active(['site-identity.index'])}}">Site Identity</a></li>

            <li><a href="{{ route('social-media.index') }}" class="{{set_active(['social-media.index'])}}">Social Media</a></li>

        </ul>
    </li>
    <!-- <li class="profile">
        <div class="profile-details">
            <div class="name_job">
                <div class="name">{{ Auth::user()->name }}</div>
                <div class="job">{{ Auth::user()->roles->first()->name }}</div>
            </div>

        </div>
        <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
            <i class='bx bx-log-out' id="log_out"></i>
        </a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
            @csrf
        </form>

    </li> -->

</ul>