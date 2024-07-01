<div class="sidebar pe-4 pb-3">
    <nav class="navbar bg-secondary navbar-dark">
        <a href="index.html" class="navbar-brand mx-4 mb-3">
            <h3 class="text-primary"><i class="fa fa-user-edit me-2"></i>DarkPan</h3>
        </a>
        <div class="d-flex align-items-center ms-4 mb-4">
            <div class="position-relative">
                <img class="rounded-circle" src="img/user.jpg" alt="" style="width: 40px; height: 40px;">
                <div
                    class="bg-success rounded-circle border border-2 border-white position-absolute end-0 bottom-0 p-1">
                </div>
            </div>
            <div class="ms-3">
                <h6 class="mb-0">{{ Auth::user()->name }}</h6>
                <span>Admin</span>
            </div>
        </div>
        <div class="navbar-nav w-100">
            <a href="{{ route('admin.dashboard') }}"
                class="nav-item nav-link {{ Request::segment(2) === 'dashboard' ? ' active' : '' }}">
                <i class="fa fa-tachometer-alt me-2"></i>Dashboard</a>

            <a href="{{ route('admin.setting') }}"
                class="nav-item nav-link {{ Request::segment(2) === 'setting' ? ' active' : '' }}">
                <i class="fa fa-cog me-2"></i>Setting</a>
            <a href="{{ route('skill.index') }}"
                class="nav-item nav-link {{ Request::segment(2) === 'skill' ? ' active' : '' }}">
                <i class="fa fa-heart me-2"></i>Skill</a>
            <a href="{{ route('qualification.index') }}"
                class="nav-item nav-link {{ Request::segment(2) === 'qualification' ? ' active' : '' }}">
                <i class="fa fa-briefcase" aria-hidden="true"></i>Qualification</a>
            <div class="nav-item dropdown">
                <a href="#"
                    class="nav-link dropdown-toggle {{ Request::segment(2) === 'project' ? ' active' : '' }}"
                    data-bs-toggle="dropdown"><i class="fa fa-laptop me-2"></i>Projects</a>
                <div class="dropdown-menu bg-transparent border-0">
                    <a href="{{ route('project-category.index') }}"
                        class=" dropdown-item nav-item nav-link {{ Request::segment(2) === 'project-category' ? ' active' : '' }}">Project
                        Categories</a>
                    <a href="{{ route('project-item.index') }}"
                        class=" dropdown-item nav-item nav-link {{ Request::segment(2) === 'project-item' ? ' active' : '' }}">Project
                        Items</a>
                    <a href="{{ route('project.index') }}"
                        class=" dropdown-item nav-item nav-link {{ Request::segment(2) === 'project' ? ' active' : '' }}">Projects</a>
                </div>
            </div>

        </div>
    </nav>
</div>
