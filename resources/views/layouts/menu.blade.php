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
    <a class="c-sidebar-brand-full" style="font-size:15px;"><strong><i>Menu Agents</i></strong></a>
    <a class="c-sidebar-brand-minimized" style="font-size:15px;"><strong><i></i></strong></a>
</div>

<li class="c-sidebar-nav-item c-sidebar-nav-dropdown {{ request()->routeIs('umroh-customers.*') ? 'c-show' : '' }}">
    <a class="c-sidebar-nav-link c-sidebar-nav-dropdown-toggle" href="#">
        <i class="c-sidebar-nav-icon bi bi-person-vcard" style="line-height: 1;"></i> My Customers Network
    </a>
    <ul class="c-sidebar-nav-dropdown-items">
        {{-- @can('access_customers') --}}
            <li class="c-sidebar-nav-item">
                <a class="c-sidebar-nav-link {{ request()->routeIs('umroh-customers.*') ? 'c-active' : '' }}" href="{{ route('umroh-customers.data') }}">
                    <i class="c-sidebar-nav-icon bi bi-people-fill" style="line-height: 1;"></i> Umroh Customers
                </a>
            </li>
        {{-- @endcan --}}
        {{-- @can('access_customers') --}}
        <li class="c-sidebar-nav-item">
            <a class="c-sidebar-nav-link {{ request()->routeIs('hajj-customers.*') ? 'c-active' : '' }}" href="{{ route('hajj-customers.data') }}">
                <i class="c-sidebar-nav-icon bi bi-people-fill" style="line-height: 1;"></i> Hajj Customers
            </a>
        </li>
        {{-- @endcan --}}
                {{-- @can('access_customers') --}}
            <li class="c-sidebar-nav-item">
                <a class="c-sidebar-nav-link {{ request()->routeIs('umroh-saving-customers.*') ? 'c-active' : '' }}" href="{{ route('umroh-saving-customers.data') }}">
                    <i class="c-sidebar-nav-icon bi bi-people-fill" style="line-height: 1;"></i> Umroh Saving Customers
                </a>
            </li>
        {{-- @endcan --}}
                {{-- @can('access_customers') --}}
            <li class="c-sidebar-nav-item">
                <a class="c-sidebar-nav-link {{ request()->routeIs('hajj-saving-customers.*') ? 'c-active' : '' }}" href="{{ route('hajj-saving-customers.data') }}">
                    <i class="c-sidebar-nav-icon bi bi-people-fill" style="line-height: 1;"></i> Hajj Saving Customers
                </a>
            </li>
        {{-- @endcan --}}
</ul>
</li>

<li class="c-sidebar-nav-item c-sidebar-nav-dropdown {{ request()->routeIs('customers.*') || request()->routeIs('potential-customers-list.*') ? 'c-show' : '' }} ">
    <a class="c-sidebar-nav-link c-sidebar-nav-dropdown-toggle" href="#">
        <i class="c-sidebar-nav-icon bi bi-person-video2" style="line-height: 1;"></i> My Marketing Network
    </a>
    <ul class="c-sidebar-nav-dropdown-items">
        {{-- @can('access_customers') --}}
            <li class="c-sidebar-nav-item">
                <a class="c-sidebar-nav-link {{ request()->routeIs('potential-umroh-customers.*') ? 'c-active' : '' }}" href="{{ route('potential-umroh-customers.data') }}">
                    <i class="c-sidebar-nav-icon bi bi-person-check" style="line-height: 1;"></i> Potential Umroh Customers
                </a>
            </li>
        {{-- @endcan --}}
    </ul>
    <ul class="c-sidebar-nav-dropdown-items">
        {{-- @can('access_customers') --}}
            <li class="c-sidebar-nav-item">
                <a class="c-sidebar-nav-link {{ request()->routeIs('customers.*') ? 'c-active' : '' }}" href="{{ route('customers.index') }}">
                    <i class="c-sidebar-nav-icon bi bi-person-bounding-box" style="line-height: 1;"></i> Prospek Customers
                </a>
            </li>
        {{-- @endcan --}}
    </ul>
</li>


<li class="c-sidebar-nav-item c-sidebar-nav-dropdown {{ request()->routeIs('rewards-agents-list.*') ? 'c-show' : '' }}">
    <a class="c-sidebar-nav-link c-sidebar-nav-dropdown-toggle" href="#">
        <i class="c-sidebar-nav-icon bi bi-person-badge" style="line-height: 1;"></i> My Agents Network
    </a>
    <ul class="c-sidebar-nav-dropdown-items">
        {{-- @can('access_customers') --}}
            <li class="c-sidebar-nav-item">
                <a class="c-sidebar-nav-link {{ request()->routeIs('rewards-agents-list.*') ? 'c-active' : '' }}" href="{{ route('rewards-agents-list.show-agents') }}">
                    <i class="c-sidebar-nav-icon bi bi-person-badge-fill" style="line-height: 1;"></i> All Agents
                </a>
            </li>
        {{-- @endcan --}}
    </ul>
</li>

<li class="c-sidebar-nav-item c-sidebar-nav-dropdown {{ request()->routeIs('activity.*') ? 'c-show' : '' }}">
    <a class="c-sidebar-nav-link c-sidebar-nav-dropdown-toggle" href="#">
        <i class="c-sidebar-nav-icon bi bi-journal-bookmark" style="line-height: 1;"></i> My Activity Report
    </a>
    <ul class="c-sidebar-nav-dropdown-items">
        {{-- @can('access_customers') --}}
            <li class="c-sidebar-nav-item">
                <a class="c-sidebar-nav-link {{ request()->routeIs('activity.*') ? 'c-active' : '' }}" href="{{ route('activity.index') }}">
                    <i class="c-sidebar-nav-icon bi bi-journal-check" style="line-height: 1;"></i> All Activity
                </a>
            </li>
        {{-- @endcan --}}
    </ul>
</li>

<li class="c-sidebar-nav-item c-sidebar-nav-dropdown {{ request()->routeIs('agent-payments.*') ? 'c-show' : '' }}">
    <a class="c-sidebar-nav-link c-sidebar-nav-dropdown-toggle" href="#">
        <i class="c-sidebar-nav-icon bi bi-cash-stack" style="line-height: 1;"></i> History Payments
    </a>
    <ul class="c-sidebar-nav-dropdown-items">
        {{-- @can('access_customers') --}}
            <li class="c-sidebar-nav-item">
                <a class="c-sidebar-nav-link {{ request()->routeIs('agent-payments.*') ? 'c-active' : '' }}" href="{{ route('agent-payments.index') }}">
                    <i class="c-sidebar-nav-icon bi bi-cash-stack" style="line-height: 1;"></i> All Payments
                </a>
            </li>
        {{-- @endcan --}}
    </ul>
</li>

@can('access_user_management')
    <li class="c-sidebar-nav-item c-sidebar-nav-dropdown {{ request()->routeIs('roles*') ? 'c-show' : '' }}">
        <a class="c-sidebar-nav-link c-sidebar-nav-dropdown-toggle" href="#">
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
    <li class="c-sidebar-nav-item c-sidebar-nav-dropdown {{ request()->routeIs('currencies.*') || request()->routeIs('units.*') || request()->routeIs('settings.*') || request()->routeIs('settings-rewards.*') ? 'c-show' : '' }}">
        <a class="c-sidebar-nav-link c-sidebar-nav-dropdown-toggle" href="#">
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
