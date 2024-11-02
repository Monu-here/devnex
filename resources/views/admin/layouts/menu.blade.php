<div class="brand-logo d-flex align-items-center justify-content-between">
    <a href="{{route('admin.dashboard')}}" class="text-nowrap logo-img">
        <img src="{{ asset('assets/img/AMFL-LOGO-1.png') }}" width="90" alt="" />
    </a>
    <div class="close-btn d-xl-none d-block sidebartoggler cursor-pointer" id="sidebarCollapse">
        <i class="ti ti-x fs-8"></i>
    </div>
</div>
<nav class="sidebar-nav scroll-sidebar" data-simplebar="">
    <ul id="sidebarnav">
        <li class="nav-small-cap">
            <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
            <span class="hide-menu">Home</span>
        </li>
        <li class="sidebar-item">
            <a class="sidebar-link" href="{{route('admin.dashboard')}}" aria-expanded="false">
                <span>
                    <i class="ti ti-layout-dashboard"></i>
                </span>
                <span class="hide-menu">Dashboard</span>
            </a>
        </li>
        <li class="nav-small-cap">
            <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
            <span class="hide-menu">COMPONENTS</span>
        </li>
        <li class="sidebar-item">
            <a class="sidebar-link" href="{{route('admin.blog.index')}}" aria-expanded="false">
                <span>
                    <i class="ti ti-article"></i>
                </span>
                <span class="hide-menu">Blog</span>
            </a>
        </li>
        <li class="sidebar-item">
            <a class="sidebar-link" href="{{route('admin.event.index')}}" aria-expanded="false">
                <span>
                    <i class="ti ti-article"></i>
                </span>
                <span class="hide-menu">Event</span>
            </a>
        </li>
        <li class="sidebar-item">
            <a class="sidebar-link" href="{{route('admin.contactus.index')}}" aria-expanded="false">
                <span>
                    <i class="ti ti-article"></i>
                </span>
                <span class="hide-menu">Contact Us</span>
            </a>
        </li>
        <li class="sidebar-item">
            <a class="sidebar-link" href="{{route('admin.catalog.catalogIndex')}}" aria-expanded="false">
                <span>
                    <i class="ti ti-article"></i>
                </span>
                <span class="hide-menu">Catalog</span>
            </a>
        </li>
       
    </ul>
</nav>
