<div class="mb-2 ml-3" style="font-size:15px;">
    <a class="c-sidebar-brand-full" style="font-size:15px;"><strong><i>Menu Dashboard</i></strong></a>
    <a class="c-sidebar-brand-minimized" style="font-size:15px;"><strong><i></i></strong></a>
</div>


<li class="c-sidebar-nav-item {{ request()->routeIs('home') ? 'c-active' : '' }}">
    <a class="c-sidebar-nav-link" href="{{ route('home') }}">
        <i class="c-sidebar-nav-icon bi bi-house" style="line-height: 1;"></i> Home
    </a>
</li>

<hr class="sidebar-divider" style="color:white">

<div class="mb-2 ml-3" style="font-size:15px;">
    <a class="c-sidebar-brand-full" style="font-size:15px;"><strong><i>Menu Management</i></strong></a>
    <a class="c-sidebar-brand-minimized" style="font-size:15px;"><strong><i></i></strong></a>
</div>

<li class="c-sidebar-nav-item c-sidebar-nav-dropdown {{ request()->routeIs('teachers.*') ? 'c-show' : '' }}">
    <a class="c-sidebar-nav-link c-sidebar-nav-dropdown-toggle">
        <i class="c-sidebar-nav-icon bi bi-person-vcard" style="line-height: 1;"></i> Data Pengajar
    </a>
    <ul class="c-sidebar-nav-dropdown-items">
        {{-- @can('access_customers') --}}
            <li class="c-sidebar-nav-item">
                <a class="c-sidebar-nav-link {{ request()->routeIs('teachers.*') ? 'c-active' : '' }}" href="{{ route('teachers.index') }}">
                    <i class="c-sidebar-nav-icon bi bi-people-fill" style="line-height: 1;"></i> Data Pengajar
                </a>
            </li>
        {{-- @endcan --}}
    </ul>
</li>

<li class="c-sidebar-nav-item c-sidebar-nav-dropdown {{ request()->routeIs('students.*') ? 'c-show' : '' }}">
    <a class="c-sidebar-nav-link c-sidebar-nav-dropdown-toggle">
        <i class="c-sidebar-nav-icon bi bi-person-badge" style="line-height: 1;"></i> Data Siswa
    </a>
    <ul class="c-sidebar-nav-dropdown-items">
        {{-- @can('access_customers') --}}
            <li class="c-sidebar-nav-item">
                <a class="c-sidebar-nav-link {{ request()->routeIs('students.*') ? 'c-active' : '' }}" href="{{ route('students.index') }}">
                    <i class="c-sidebar-nav-icon bi bi-people-fill" style="line-height: 1;"></i> Data Siswa
                </a>
            </li>
        {{-- @endcan --}}
    </ul>
</li>

<li class="c-sidebar-nav-item c-sidebar-nav-dropdown {{ request()->routeIs('studies.*') ? 'c-show' : '' }}">
    <a class="c-sidebar-nav-link c-sidebar-nav-dropdown-toggle">
        <i class="c-sidebar-nav-icon bi bi-book" style="line-height: 1;"></i> Data Pelajaran
    </a>
    <ul class="c-sidebar-nav-dropdown-items">
        {{-- @can('access_customers') --}}
            <li class="c-sidebar-nav-item">
                <a class="c-sidebar-nav-link {{ request()->routeIs('studies.*') ? 'c-active' : '' }}" href="{{ route('studies.index') }}">
                    <i class="c-sidebar-nav-icon bi bi-journal-text" style="line-height: 1;"></i> Data Pelajaran
                </a>
            </li>
        {{-- @endcan --}}
    </ul>
</li>

<li class="c-sidebar-nav-item c-sidebar-nav-dropdown {{ request()->routeIs('report1.*') || request()->routeIs('kelas2-task.*') ? 'c-show' : '' }}">
    <a class="c-sidebar-nav-link c-sidebar-nav-dropdown-toggle">
        <i class="c-sidebar-nav-icon bi bi-journal-bookmark" style="line-height: 1;"></i> Data Aktifitas
    </a>
    <ul class="c-sidebar-nav-dropdown-items">
        {{-- @can('access_customers') --}}
            <li class="c-sidebar-nav-item">
                <a class="c-sidebar-nav-link {{ request()->routeIs('report1.*') ? 'c-active' : '' }}" href="{{ route('report1.index') }}">
                    <i class="c-sidebar-nav-icon bi bi-journal-check" style="line-height: 1;"></i> Kelas Mengaji Anak TK
                </a>
            </li>
        {{-- @endcan --}}
    </ul>
    <ul class="c-sidebar-nav-dropdown-items">
        {{-- @can('access_customers') --}}
            <li class="c-sidebar-nav-item">
                <a class="c-sidebar-nav-link {{ request()->routeIs('kelas2-task.*') ? 'c-active' : '' }}" href="{{ route('kelas2-task.index') }}">
                    <i class="c-sidebar-nav-icon bi bi-journal-check" style="line-height: 1;"></i> Kelas Mengaji Anak SD
                </a>
            </li>
        {{-- @endcan --}}
    </ul>
    <ul class="c-sidebar-nav-dropdown-items">
        {{-- @can('access_customers') --}}
            <li class="c-sidebar-nav-item">
                <a class="c-sidebar-nav-link" style="color:gray;">
                    <i class="c-sidebar-nav-icon bi bi-journal-check" style="line-height: 1;"></i> Kelas Mengaji Al Quran
                </a>
            </li>
        {{-- @endcan --}}
    </ul>
</li>

<li class="c-sidebar-nav-item c-sidebar-nav-dropdown {{ request()->routeIs('report1result.*') || request()->routeIs('kelas2-result.*') ? 'c-show' : '' }}">
    <a class="c-sidebar-nav-link c-sidebar-nav-dropdown-toggle">
        <i class="c-sidebar-nav-icon bi bi-clipboard2-data" style="line-height: 1;"></i> Laporan Aktifitas
    </a>
    <ul class="c-sidebar-nav-dropdown-items">
        {{-- @can('access_customers') --}}
            <li class="c-sidebar-nav-item">
                <a class="c-sidebar-nav-link {{ request()->routeIs('report1result.*') ? 'c-active' : '' }}" href="{{ route('report1result.index') }}">
                    <i class="c-sidebar-nav-icon bi bi-file-earmark-bar-graph" style="line-height: 1;"></i> Laporan Mengaji Anak TK
                </a>
            </li>
        {{-- @endcan --}}
    </ul>
    <ul class="c-sidebar-nav-dropdown-items">
        {{-- @can('access_customers') --}}
            <li class="c-sidebar-nav-item">
                <a class="c-sidebar-nav-link {{ request()->routeIs('kelas2-result.*') ? 'c-active' : '' }}" href="{{ route('kelas2-result.index') }}">
                    <i class="c-sidebar-nav-icon bi bi-file-earmark-bar-graph" style="line-height: 1;"></i> Laporan Mengaji Anak SD
                </a>
            </li>
        {{-- @endcan --}}
    </ul>
    <ul class="c-sidebar-nav-dropdown-items">
        {{-- @can('access_customers') --}}
            <li class="c-sidebar-nav-item">
                <a class="c-sidebar-nav-link" style="color:gray;">
                    <i class="c-sidebar-nav-icon bi bi-file-earmark-bar-graph" style="line-height: 1;"></i> Laporan Mengaji Al Quran
                </a>
            </li>
        {{-- @endcan --}}
    </ul>
</li>

<li class="c-sidebar-nav-item c-sidebar-nav-dropdown">
    <a class="c-sidebar-nav-link c-sidebar-nav-dropdown-toggle">
        <i class="c-sidebar-nav-icon bi bi-printer" style="line-height: 1;"></i> Cetak Laporan
    </a>
    <ul class="c-sidebar-nav-dropdown-items">
        {{-- @can('access_customers') --}}
            <li class="c-sidebar-nav-item">
                <a class="c-sidebar-nav-link" style="color:gray;">
                    <i class="c-sidebar-nav-icon bi bi-file-earmark-bar-graph" style="line-height: 1;"></i> Cetak By Siswa
                </a>
            </li>
        {{-- @endcan --}}
    </ul>
    <ul class="c-sidebar-nav-dropdown-items">
        {{-- @can('access_customers') --}}
            <li class="c-sidebar-nav-item">
                <a class="c-sidebar-nav-link" style="color:gray;">
                    <i class="c-sidebar-nav-icon bi bi-file-earmark-bar-graph" style="line-height: 1;"></i> Cetak By Kelas
                </a>
            </li>
        {{-- @endcan --}}
    </ul>
</li>

@can('access_user_management')
    <li class="c-sidebar-nav-item c-sidebar-nav-dropdown {{ request()->routeIs('roles*') ? 'c-show' : '' }}">
        <a class="c-sidebar-nav-link c-sidebar-nav-dropdown-toggle">
            <i class="c-sidebar-nav-icon bi bi-people" style="line-height: 1;"></i> Access System
        </a>
        <ul class="c-sidebar-nav-dropdown-items">
            <li class="c-sidebar-nav-item">
                <a class="c-sidebar-nav-link {{ request()->routeIs('users.create') ? 'c-active' : '' }}" href="{{ route('users.create') }}">
                    <i class="c-sidebar-nav-icon bi bi-person-plus" style="line-height: 1;"></i> Create User
                </a>
            </li>
            <li class="c-sidebar-nav-item">
                <a class="c-sidebar-nav-link {{ request()->routeIs('users*') ? 'c-active' : '' }}" href="{{ route('users.index') }}">
                    <i class="c-sidebar-nav-icon bi bi-person-lines-fill" style="line-height: 1;"></i> All Users
                </a>
            </li>
            <li class="c-sidebar-nav-item">
                <a class="c-sidebar-nav-link {{ request()->routeIs('roles*') ? 'c-active' : '' }}" href="{{ route('roles.index') }}">
                    <i class="c-sidebar-nav-icon bi bi-key" style="line-height: 1;"></i> Roles & Permissions
                </a>
            </li>
        </ul>
    </li>
@endcan

@can('access_currencies|access_settings')
    <li class="c-sidebar-nav-item c-sidebar-nav-dropdown {{ request()->routeIs('settings.*') ? 'c-show' : '' }}">
        <a class="c-sidebar-nav-link c-sidebar-nav-dropdown-toggle">
            <i class="c-sidebar-nav-icon bi bi-gear" style="line-height: 1;"></i> Settings
        </a>
        @can('access_settings')
        <ul class="c-sidebar-nav-dropdown-items">
            <li class="c-sidebar-nav-item">
                <a class="c-sidebar-nav-link {{ request()->routeIs('settings.*') ? 'c-active' : '' }}" href="{{ route('settings.index') }}">
                    <i class="c-sidebar-nav-icon bi bi-sliders" style="line-height: 1;"></i> System Settings
                </a>
            </li>
        </ul>
        @endcan
    </li>
@endcan
