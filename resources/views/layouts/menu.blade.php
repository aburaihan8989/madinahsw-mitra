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

<li class="c-sidebar-nav-item c-sidebar-nav-dropdown {{ request()->routeIs('customers.*') ? 'c-show' : '' }}">
    <a class="c-sidebar-nav-link c-sidebar-nav-dropdown-toggle">
        <i class="c-sidebar-nav-icon bi bi-person-vcard" style="line-height: 1;"></i> Data Jamaah
    </a>
    <ul class="c-sidebar-nav-dropdown-items">
        {{-- @can('access_customers') --}}
            <li class="c-sidebar-nav-item">
                <a class="c-sidebar-nav-link {{ request()->routeIs('customers.*') ? 'c-active' : '' }}" href="{{ route('customers.index') }}">
                    <i class="c-sidebar-nav-icon bi bi-person-vcard-fill" style="line-height: 1;"></i> Data Jamaah
                </a>
            </li>
        {{-- @endcan --}}
    </ul>
</li>

<li class="c-sidebar-nav-item c-sidebar-nav-dropdown {{ request()->routeIs('packages.*') ? 'c-show' : '' }}">
    <a class="c-sidebar-nav-link c-sidebar-nav-dropdown-toggle">
        <i class="c-sidebar-nav-icon bi bi-clipboard-check" style="line-height: 1;"></i> Data Keberangkatan
    </a>
    <ul class="c-sidebar-nav-dropdown-items">
        {{-- @can('access_customers') --}}
            <li class="c-sidebar-nav-item">
                <a class="c-sidebar-nav-link {{ request()->routeIs('packages.*') ? 'c-active' : '' }}" href="{{ route('packages.index') }}">
                    <i class="c-sidebar-nav-icon bi bi-clipboard-check-fill" style="line-height: 1;"></i> Data Keberangkatan
                </a>
            </li>
        {{-- @endcan --}}
    </ul>
</li>

@can('access_settings')
<li class="c-sidebar-nav-item c-sidebar-nav-dropdown {{ request()->routeIs('products.*') ? 'c-show' : '' }}">
    <a class="c-sidebar-nav-link c-sidebar-nav-dropdown-toggle">
        <i class="c-sidebar-nav-icon bi bi-bag-check" style="line-height: 1;"></i> Data Layanan
    </a>
    <ul class="c-sidebar-nav-dropdown-items">
        {{-- @can('access_customers') --}}
            <li class="c-sidebar-nav-item">
                <a class="c-sidebar-nav-link {{ request()->routeIs('products.*') ? 'c-active' : '' }}" href="{{ route('products.index') }}">
                    <i class="c-sidebar-nav-icon bi bi-bag-check-fill" style="line-height: 1;"></i> Data Layanan
                </a>
            </li>
        {{-- @endcan --}}
    </ul>
</li>
@endcan

@can('access_settings')
    <li class="c-sidebar-nav-item c-sidebar-nav-dropdown {{ request()->routeIs('roles*') || request()->routeIs('users*') ? 'c-show' : '' }}">
        <a class="c-sidebar-nav-link c-sidebar-nav-dropdown-toggle">
            <i class="c-sidebar-nav-icon bi bi-people" style="line-height: 1;"></i> Access System
        </a>
        <ul class="c-sidebar-nav-dropdown-items">
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

@can('access_settings')
    <li class="c-sidebar-nav-item c-sidebar-nav-dropdown {{ request()->routeIs('settings.*') ? 'c-show' : '' }}">
        <a class="c-sidebar-nav-link c-sidebar-nav-dropdown-toggle">
            <i class="c-sidebar-nav-icon bi bi-gear" style="line-height: 1;"></i> Settings
        </a>
        @can('access_currencies')
        <ul class="c-sidebar-nav-dropdown-items">
            <li class="c-sidebar-nav-item">
                <a class="c-sidebar-nav-link {{ request()->routeIs('currencies.*') ? 'c-active' : '' }}" href="{{ route('currencies.index') }}">
                    <i class="c-sidebar-nav-icon bi bi-cash-stack" style="line-height: 1;"></i> Currencies
                </a>
            </li>
        </ul>
        @endcan
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
