<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon">
            <i class="fas fa-code"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Blog Admin</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider d-flex my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item {{ Request::is('dashboard') ? 'active' : '' }}">
        <a class="nav-link" href="/dashboard">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-flex my-0">

    <!-- Nav Item - Tables -->
    <li class="nav-item {{ Request::is('dashboard/posts*') ? 'active' : '' }}">
        <a class="nav-link" href="/dashboard/posts">
            <i class="fa fa-fw fa-clipboard-list"></i>
            <span>My Posts</span></a>
    </li>


    <!-- Divider -->
    <hr class="sidebar-divider d-flex my-2">

    @can('admin')

    <!-- Heading -->
    <div class="sidebar-heading">
        Administrator
    </div>

    <!-- Nav Item - Tables -->
    <li class="nav-item {{ Request::is('dashboard/categories*') ? 'active' : '' }}">
        <a class="nav-link" href="/dashboard/categories">
            <i class="fas fa-fw fa-boxes"></i>
            <span>Post Categories</span></a>
    </li>
    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">
    @endcan

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>

<!-- End of Sidebar -->
