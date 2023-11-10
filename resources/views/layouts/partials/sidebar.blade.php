<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
        <img src="{{ asset('img/AdminLTELogo.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
            style="opacity: .8">
        <span class="brand-text font-weight-light">Asset Management</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{ asset('img/users/' . (Auth::guard('web')->user()->avatar ?? 'user.png')) }}"
                    class="img-circle elevation-2" alt="User Image">
            </div>

            <div class="info">
                <a href="#" class="d-block">{{ Auth::guard('web')->user()->name }}</a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">
                @if (auth()->user()->can('dashbord-overview') ||
                        auth()->user()->can('dashbord-maps'))
                    <li
                        class="nav-item {{ request()->segment(1) == 'overview' || request()->segment(1) == 'maps' ? ' open' : '' }}">
                        <a href="#"
                            class="nav-link {{ request()->segment(1) == 'overview' || request()->segment(1) == 'maps' ? 'active' : '' }}">
                            <i class="nav-icon fas fa-tachometer-alt"></i>

                            <p>
                                Dashboard <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>

                        <ul class="nav nav-treeview">
                            @if (auth()->user()->can('dashbord-overview'))
                                <li class="nav-item">
                                    <a href="{{ route('dashboard.overview') }}"
                                        class="nav-link {{ request()->segment(1) == 'overview' ? 'active' : '' }}">
                                        <i class="far fa-circle nav-icon"></i>

                                        <p>Overview</p>
                                    </a>
                                </li>
                            @endif

                            @if (auth()->user()->can('dashbord-maps'))
                                <li class="nav-item">
                                    <a href="{{ route('dashboard.maps') }}"
                                        class="nav-link {{ request()->segment(1) == 'maps' ? 'active' : '' }}">
                                        <i class="far fa-circle nav-icon"></i>

                                        <p>Maps</p>
                                    </a>
                                </li>
                            @endif
                        </ul>
                    </li>
                @endif

                @if (auth()->user()->can('asset-list'))
                    <li class="nav-item">
                        <a href="{{ route('assets.index') }}"
                            class="nav-link {{ request()->segment(1) == 'assets' ? 'active' : '' }}">
                            <i class="nav-icon fas fa-archive"></i>

                            <p>Assets</p>
                        </a>
                    </li>
                @endif

                @if (auth()->user()->can('maintenance-list') ||
                        auth()->user()->can('work-order-list'))
                    <li
                        class="nav-item {{ request()->segment(1) == 'work-orders' || request()->segment(1) == 'schedule-maintenances' ? 'menu-open' : '' }}">
                        <a href="#"
                            class="nav-link {{ request()->segment(1) == 'work-orders' || request()->segment(1) == 'schedule-maintenances' ? 'active' : '' }}">
                            <i class="nav-icon fas fa-tools"></i>

                            <p>
                                Maintenances <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            @if (auth()->user()->can('maintenance-list'))
                                <li class="nav-item">
                                    <a href="{{ route('schedule-maintenances.index') }}"
                                        class="nav-link {{ request()->segment(1) == 'schedule-maintenances' ? 'active' : '' }}">
                                        <i class="far fa-circle nav-icon"></i>

                                        <p>Schedule</p>
                                    </a>
                                </li>
                            @endif

                            @if (auth()->user()->can('work-order-list'))
                                <li class="nav-item">
                                    <a href="{{ route('work-orders.index') }}"
                                        class="nav-link {{ request()->segment(1) == 'work-orders' ? 'active' : '' }}">
                                        <i class="far fa-circle nav-icon"></i>

                                        <p>Work Order</p>
                                    </a>
                                </li>
                            @endif
                        </ul>
                    </li>
                @endif

                @if (auth()->user()->can('location-list') ||
                        auth()->user()->can('location-category-list'))
                    <li
                        class="nav-item {{ request()->segment(1) == 'locations' || request()->segment(1) == 'location-categories' ? 'menu-open' : '' }}">
                        <a href="#"
                            class="nav-link {{ request()->segment(1) == 'locations' || request()->segment(1) == 'location-categories' ? 'active' : '' }}">
                            <i class="nav-icon fas fa-map-marker-alt"></i>
                            <p>
                                Location
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            @if (auth()->user()->can('location-list'))
                                <li class="nav-item">
                                    <a href="{{ route('locations.index') }}"
                                        class="nav-link {{ request()->segment(1) == 'locations' ? 'active' : '' }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>All location</p>
                                    </a>
                                </li>
                            @endif

                            @if (auth()->user()->can('location-category-list'))
                                <li class="nav-item">
                                    <a href="{{ route('location-categories.index') }}"
                                        class="nav-link {{ request()->segment(1) == 'location-categories' ? 'active' : '' }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Location Category</p>
                                    </a>
                                </li>
                            @endif
                        </ul>
                    </li>
                @endif

                {{-- @if (auth()->user()->can('location-list') ||
    auth()->user()->can('location-category-list')) --}}
                {{-- <li class="nav-item {{ request()->segment(1) == 'form' || request()->segment(1) == 'power-station' ? 'menu-open' : '' }}">
                    <a href="#"
                        class="nav-link {{ request()->segment(1) == 'form' || request()->segment(1) == 'power-station' ? 'active' : '' }}">
                        <i class="nav-icon fas fa-folder"></i>
                        <p>
                            Form
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('form.power-station.index') }}"
                                class="nav-link {{ request()->segment(1) == 'power-station' ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Power Station</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{ route('form.electrical-utility.index') }}"
                                class="nav-link {{ request()->segment(1) == 'electrical-utility' ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Electrical Utility</p>
                            </a>
                        </li>


                        <li class="nav-item">
                            <a href="{{ route('form.electrical-protection.index') }}"
                                class="nav-link {{ request()->segment(1) == 'hv-mv' ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Electrical Protection</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{ route('form.hv-mv-station.index') }}"
                                class="nav-link {{ request()->segment(1) == 'hv-mv' ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>HV & MV Station</p>
                            </a>
                        </li>
                </li>
            </ul>
            </li> --}}

            @if (auth()->user()->can('master-data'))
                <li class="nav-item">
                    <a href="{{ route('master-data.index') }}"
                        class="nav-link {{ request()->segment(1) == 'master-data' || request()->segment(1) == 'roles' || request()->segment(1) == 'users' || request()->segment(1) == 'user-technicals' || request()->segment(1) == 'user-technical-groups' || request()->segment(1) == 'categories' || request()->segment(1) == 'types' || request()->segment(1) == 'materials' || request()->segment(1) == 'boms' || request()->segment(1) == 'tasks' || request()->segment(1) == 'task-groups' ? 'active' : '' }}">
                        <i class="nav-icon fas fa-folder"></i>
                        <p>Master Data</p>
                    </a>
                </li>
            @endif

            @if (auth()->user()->can('report-maintenance'))
                <li class="nav-item {{ request()->segment(1) == 'report' ? 'menu-open' : '' }}">
                    <a href="#" class="nav-link {{ request()->segment(1) == 'report' ? 'active' : '' }}">
                        <i class="nav-icon fas fa-file-signature"></i>
                        <p>
                            Report & History <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>

                    <ul class="nav nav-treeview">
                        {{-- <li class="nav-item">
                            <a href="{{ route('daily-wok-order-reports') }}"
                                class="nav-link {{ request()->segment(1) == 'daily-wok-order-reports' ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Report Daily WO</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{ route('reports') }}"
                                class="nav-link {{ request()->segment(1) == 'reports' ? 'active' : '' }}">
                                <i class="nav-icon fas fa-file-signature"></i>
                                <p>Report Maintenance</p>
                            </a>
                        </li> --}}

                        {{-- <li class="nav-item">
                            <a href="{{ route('assets.maintenance-history') }}"
                                class="nav-link {{ request()->segment(2) == 'maintenance-history' ? 'active' : '' }}">
                                <i class="nav-icon fas fa-file-signature"></i>
                                <p>Asset By Work Order History</p>
                            </a>
                        </li> --}}

                        {{-- UNIT BAGIAN - ELECTRICAL UTILITY --}}
                        <li class="nav-item {{ request()->segment(2) == 'electrical-utility' ? 'menu-open' : 'menu-close' }}">
                            <a href="#" class="nav-link {{ request()->segment(2) == 'electrical-utility' ? 'active' : '' }}">
                                <i class="nav-icon fas fa-bolt"></i>
                                <p>
                                    Electrical Utility <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
        
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ route('report.electrical-utility.electrical-utility.index') }}"
                                        class="nav-link {{ request()->segment(3) == 'electrical-utility' ? 'active' : '' }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Electrical Utility</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('report.electrical-utility.ups.index') }}"
                                        class="nav-link {{ request()->segment(1) == 'ups' ? 'active' : '' }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>UPS & Converter</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('report.electrical-utility.south-visual-aid.index') }}"
                                        class="nav-link {{ request()->segment(1) == 'south-visual-aid' ? 'active' : '' }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>South Visual AID</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('report.electrical-utility.north-visual-aid.index') }}"
                                        class="nav-link {{ request()->segment(1) == 'north-visual-aid' ? 'active' : '' }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>North Visual AID</p>
                                    </a>
                                </li>
                            </ul>
                        </li>

                        {{-- UNIT BAGIAN - ENERGY & POWER SUPPLY --}}
                        <li class="nav-item {{ request()->segment(2) == 'energy-power-supply' ? 'menu-open' : 'menu-close' }}">
                            <a href="#" class="nav-link {{ request()->segment(1) == 'energy-power-supply' ? 'active' : '' }}">
                                <i class="nav-icon fas fa-charging-station"></i>
                                <p>
                                    Energy & Power Supply <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
        
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href=""
                                        class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Electrical Network</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('report.energy-power-supply.electrical-protection.index') }}"
                                        class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Electrical Protection</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href=""
                                        class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>HV & MV  Station</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('report.energy-power-supply.power-station-1.index') }}"
                                        class="nav-link {{ request()->segment(3) == 'power-station-1' ? 'active' : '' }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Power Station 1</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('report.energy-power-supply.power-station-2.index') }}"
                                        class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Power Station 2</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href=""
                                        class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Power Station 3</p>
                                    </a>
                                </li>
                            </ul>
                        </li>

                        {{-- UNIT BAGIAN - MECHANICAL & AIRPORT EQUIPMENT --}}
                        <li class="nav-item {{ request()->segment(2) == 'mechanical-equipment' ? 'menu-open' : 'menu-close' }}">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-wrench"></i>
                                <p>
                                    Mechanical Equipment <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
        
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href=""
                                        class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Airport & Equipment</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#"
                                        class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Water Treatent</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('report.mechanical-equipment.sanitation-facility.index') }}"
                                        class="nav-link {{ request()->segment(1) == 'sanitation-facility' ? 'active' : '' }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Sanitation Facility</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('report.mechanical-equipment.apm.index') }}"
                                        class="nav-link {{ request()->segment(1) == 'apm' ? 'active' : '' }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>APMS Facility</p>
                                    </a>
                                </li>
                            </ul>
                        </li>

                    </ul>
                </li>
            @endif

            <li class="nav-item">
                <a href="#" class="nav-link" onclick="logout()">
                    <i class="nav-icon fas fa-sign-out-alt"></i>
                    <p>Logout</p>
                </a>
                </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
