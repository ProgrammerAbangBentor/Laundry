<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <img src="{{ asset('img/logo.png') }}" alt="logo" width="200">
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="index.html">St</a>
        </div>
        <br>
        <br>
        <hr>

        @php
            $type_menu = $type_menu ?? '';
        @endphp
        <ul class="sidebar-menu">
            <li class="menu-header">Dashboard</li>
            <li class="{{ Request::is('home') ? 'active' : '' }}">
                <a class="nav-link" href="{{ url('home') }}"><i class="fa-solid fa-house"></i>
                    <span>Dashboard</span></a>
            </li>

            <li class="menu-header">Starter</li>
            <li class="{{ Request::is('user') ? 'active' : '' }}">
                <a class="nav-link" href="{{ url('user') }}"><i class="fa-solid fa-users"></i> <span>Data
                        Users</span></a>
            </li>
            <li class="{{ Request::is('costumer') ? 'active' : '' }}">
                <a class="nav-link" href="{{ url('costumer') }}"><i class="fa-solid fa-user"></i> <span>Data
                        Costumer</span></a>
            </li>

            <li class="menu-header">Finance</li>
            <li class="nav-item dropdown {{ $type_menu === 'laundry' ? 'active' : '' }}">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-th"></i> <span>Data Finance</span></a>
                <ul class="dropdown-menu">
                    <li class="{{ Request::is('laundry') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ url('Finance') }}">Finance</a>
                    </li>
                    <li class="{{ Request::is('laundry') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ url('laundry') }}">Harga Laundry</a>
                    </li>

                </ul>
            </li>

            <li class="menu-header">Data Transaksi</li>
            <li class="{{ Request::is('order') ? 'active' : '' }}">
                <a class="nav-link" href="{{ url('order') }}"><i class="fa-solid fa-cart-shopping"></i>
                    <span>Order</span></a>
            </li>

            {{-- <li class="{{ Request::is('blank-page') ? 'active' : '' }}">
                <a class="nav-link"
                    href="{{ url('blank-page') }}"><i class="far fa-square"></i> <span>Blank Page</span></a>
            </li>
            <li class="menu-header">Stisla</li>
            <li class="nav-item dropdown {{ $type_menu === 'components' ? 'active' : '' }}">
                <a href="#"
                    class="nav-link has-dropdown"><i class="fas fa-th-large"></i>
                    <span>Components</span></a>
                <ul class="dropdown-menu">
                    <li class="{{ Request::is('components-article') ? 'active' : '' }}">
                        <a class="nav-link"
                            href="{{ url('components-article') }}">Article</a>
                    </li>
                    <li class="{{ Request::is('components-avatar') ? 'active' : '' }}">
                        <a class="nav-link beep beep-sidebar"
                            href="{{ url('components-avatar') }}">Avatar</a>
                    </li>
                    <li class="{{ Request::is('components-chat-box') ? 'active' : '' }}">
                        <a class="nav-link"
                            href="{{ url('components-chat-box') }}">Chat Box</a>
                    </li>
                    <li class="{{ Request::is('components-empty-state') ? 'active' : '' }}">
                        <a class="nav-link beep beep-sidebar"
                            href="{{ url('components-empty-state') }}">Empty State</a>
                    </li>
                    <li class="{{ Request::is('components-gallery') ? 'active' : '' }}">
                        <a class="nav-link"
                            href="{{ url('components-gallery') }}">Gallery</a>
                    </li>
                    <li class="{{ Request::is('components-hero') ? 'active' : '' }}">
                        <a class="nav-link beep beep-sidebar"
                            href="{{ url('components-hero') }}">Hero</a>
                    </li>
                    <li class="{{ Request::is('components-multiple-upload') ? 'active' : '' }}">
                        <a class="nav-link"
                            href="{{ url('components-multiple-upload') }}">Multiple Upload</a>
                    </li>
                    <li class="{{ Request::is('components-pricing') ? 'active' : '' }}">
                        <a class="nav-link beep beep-sidebar"
                            href="{{ url('components-pricing') }}">Pricing</a>
                    </li>
                    <li class="{{ Request::is('components-statistic') ? 'active' : '' }}">
                        <a class="nav-link"
                            href="{{ url('components-statistic') }}">Statistic</a>
                    </li>
                    <li class="{{ Request::is('components-tab') ? 'active' : '' }}">
                        <a class="nav-link"
                            href="{{ url('components-tab') }}">Tab</a>
                    </li>
                    <li class="{{ Request::is('components-table') ? 'active' : '' }}">
                        <a class="nav-link"
                            href="{{ url('components-table') }}">Table</a>
                    </li>
                    <li class="{{ Request::is('components-user') ? 'active' : '' }}">
                        <a class="nav-link"
                            href="{{ url('components-user') }}">User</a>
                    </li>
                    <li class="{{ Request::is('components-wizard') ? 'active' : '' }}">
                        <a class="nav-link beep beep-sidebar"
                            href="{{ url('components-wizard') }}">Wizard</a>
                    </li>
                </ul>
            </li>
            <li class="nav-item dropdown {{ $type_menu === 'forms' ? 'active' : '' }}">
                <a href="#"
                    class="nav-link has-dropdown"><i class="far fa-file-alt"></i> <span>Forms</span></a>
                <ul class="dropdown-menu">
                    <li class="{{ Request::is('forms-advanced-form') ? 'active' : '' }}">
                        <a class="nav-link"
                            href="{{ url('forms-advanced-form') }}">Advanced Form</a>
                    </li>
                    <li class="{{ Request::is('forms-editor') ? 'active' : '' }}">
                        <a class="nav-link"
                            href="{{ url('forms-editor') }}">Editor</a>
                    </li>
                    <li class="{{ Request::is('forms-validation') ? 'active' : '' }}">
                        <a class="nav-link"
                            href="{{ url('forms-validation') }}">Validation</a>
                    </li>
                </ul>
            </li> --}}
            {{-- <li class="nav-item dropdown">
                <a href="#"
                    class="nav-link has-dropdown"><i class="fas fa-map-marker-alt"></i> <span>Google
                        Maps</span></a>
                <ul class="dropdown-menu">
                    <li><a href="gmaps-advanced-route.html">Advanced Route</a></li>
                    <li><a href="gmaps-draggable-marker.html">Draggable Marker</a></li>
                    <li><a href="gmaps-geocoding.html">Geocoding</a></li>
                    <li><a href="gmaps-geolocation.html">Geolocation</a></li>
                    <li><a href="gmaps-marker.html">Marker</a></li>
                    <li><a href="gmaps-multiple-marker.html">Multiple Marker</a></li>
                    <li><a href="gmaps-route.html">Route</a></li>
                    <li><a href="gmaps-simple.html">Simple</a></li>
                </ul>
            </li> --}}
            {{-- <li class="nav-item dropdown {{ $type_menu === 'modules' ? 'active' : '' }}">
                <a href="#"
                    class="nav-link has-dropdown"><i class="fas fa-plug"></i> <span>Modules</span></a>
                <ul class="dropdown-menu">
                    <li class="{{ Request::is('modules-calendar') ? 'active' : '' }}">
                        <a class="nav-link"
                            href="{{ url('modules-calendar') }}">Calendar</a>
                    </li>
                    <li class="{{ Request::is('modules-chartjs') ? 'active' : '' }}">
                        <a class="nav-link"
                            href="{{ url('modules-chartjs') }}">ChartJS</a>
                    </li>
                    <li class="{{ Request::is('modules-datatables') ? 'active' : '' }}">
                        <a class="nav-link"
                            href="{{ url('modules-datatables') }}">DataTables</a>
                    </li>
                    <li class="{{ Request::is('modules-flag') ? 'active' : '' }}">
                        <a class="nav-link"
                            href="{{ url('modules-flag') }}">Flag</a>
                    </li>
                    <li class="{{ Request::is('modules-font-awesome') ? 'active' : '' }}">
                        <a class="nav-link"
                            href="{{ url('modules-font-awesome') }}">Font Awesome</a>
                    </li>
                    <li class="{{ Request::is('modules-ion-icons') ? 'active' : '' }}">
                        <a class="nav-link"
                            href="{{ url('modules-ion-icons') }}">Ion Icons</a>
                    </li>
                    <li class="{{ Request::is('modules-owl-carousel') ? 'active' : '' }}">
                        <a class="nav-link"
                            href="{{ url('modules-owl-carousel') }}">Owl Carousel</a>
                    </li>
                    <li class="{{ Request::is('modules-sparkline') ? 'active' : '' }}">
                        <a class="nav-link"
                            href="{{ url('modules-sparkline') }}">Sparkline</a>
                    </li>
                    <li class="{{ Request::is('modules-sweet-alert') ? 'active' : '' }}">
                        <a class="nav-link"
                            href="{{ url('modules-sweet-alert') }}">Sweet Alert</a>
                    </li>
                    <li class="{{ Request::is('modules-toastr') ? 'active' : '' }}">
                        <a class="nav-link"
                            href="{{ url('modules-toastr') }}">Toastr</a>
                    </li>
                    <li class="{{ Request::is('modules-vector-map') ? 'active' : '' }}">
                        <a class="nav-link"
                            href="{{ url('modules-vector-map') }}">Vector Map</a>
                    </li>
                    <li class="{{ Request::is('modules-weather-icon') ? 'active' : '' }}">
                        <a class="nav-link"
                            href="{{ url('modules-weather-icon') }}">Weather Icon</a>
                    </li>
                </ul>
            </li>
            <li class="menu-header">Pages</li>
            <li class="nav-item dropdown {{ $type_menu === 'auth' ? 'active' : '' }}">
                <a href="#"
                    class="nav-link has-dropdown"><i class="far fa-user"></i> <span>Auth</span></a>
                <ul class="dropdown-menu">
                    <li class="{{ Request::is('auth-forgot-password') ? 'active' : '' }}">
                        <a href="{{ url('auth-forgot-password') }}">Forgot Password</a>
                    </li>
                    <li class="{{ Request::is('auth-login') ? 'active' : '' }}">
                        <a href="{{ url('auth-login') }}">Login</a>
                    </li>
                    <li class="{{ Request::is('auth-login2') ? 'active' : '' }}">
                        <a class="beep beep-sidebar"
                            href="{{ url('auth-login2') }}">Login 2</a>
                    </li>
                    <li class="{{ Request::is('auth-register') ? 'active' : '' }}">
                        <a href="{{ url('auth-register') }}">Register</a>
                    </li>
                    <li class="{{ Request::is('auth-reset-password') ? 'active' : '' }}">
                        <a href="{{ url('auth-reset-password') }}">Reset Password</a>
                    </li>
                </ul>
            </li>
            <li class="nav-item dropdown {{ $type_menu === 'error' ? 'active' : '' }}">
                <a href="#"
                    class="nav-link has-dropdown"><i class="fas fa-exclamation"></i>
                    <span>Errors</span></a>
                <ul class="dropdown-menu">
                    <li class="{{ Request::is('error-403') ? 'active' : '' }}">
                        <a class="nav-link"
                            href="{{ url('error-403') }}">403</a>
                    </li>
                    <li class="{{ Request::is('error-404') ? 'active' : '' }}">
                        <a class="nav-link"
                            href="{{ url('error-404') }}">404</a>
                    </li>
                    <li class="{{ Request::is('error-500') ? 'active' : '' }}">
                        <a class="nav-link"
                            href="{{ url('error-500') }}">500</a>
                    </li>
                    <li class="{{ Request::is('error-503') ? 'active' : '' }}">
                        <a class="nav-link"
                            href="{{ url('error-503') }}">503</a>
                    </li>
                </ul>
            </li>
            <li class="nav-item dropdown {{ $type_menu === 'features' ? 'active' : '' }}">
                <a href="#"
                    class="nav-link has-dropdown"><i class="fas fa-bicycle"></i> <span>Features</span></a>
                <ul class="dropdown-menu">
                    <li class="{{ Request::is('features-activities') ? 'active' : '' }}">
                        <a class="nav-link"
                            href="{{ url('features-activities') }}">Activities</a>
                    </li>
                    <li class="{{ Request::is('features-post-create') ? 'active' : '' }}">
                        <a class="nav-link"
                            href="{{ url('features-post-create') }}">Post Create</a>
                    </li>
                    <li class="{{ Request::is('features-post') ? 'active' : '' }}">
                        <a class="nav-link"
                            href="{{ url('features-post') }}">Posts</a>
                    </li>
                    <li class="{{ Request::is('features-profile') ? 'active' : '' }}">
                        <a class="nav-link"
                            href="{{ url('features-profile') }}">Profile</a>
                    </li>
                    <li class="{{ Request::is('features-settings') ? 'active' : '' }}">
                        <a class="nav-link"
                            href="{{ url('features-settings') }}">Settings</a>
                    </li>
                    <li class="{{ Request::is('features-setting-detail') ? 'active' : '' }}">
                        <a class="nav-link"
                            href="{{ url('features-setting-detail') }}">Setting Detail</a>
                    </li>
                    <li class="{{ Request::is('features-tickets') ? 'active' : '' }}">
                        <a class="nav-link"
                            href="{{ url('features-tickets') }}">Tickets</a>
                    </li>
                </ul>
            </li>
            <li class="nav-item dropdown {{ $type_menu === 'utilities' ? 'active' : '' }}">
                <a href="#"
                    class="nav-link has-dropdown"><i class="fas fa-ellipsis-h"></i>
                    <span>Utilities</span></a>
                <ul class="dropdown-menu">
                    <li class="{{ Request::is('utilities-contact') ? 'active' : '' }}">
                        <a href="{{ url('utilities-contact') }}">Contact</a>
                    </li>
                    <li class="{{ Request::is('utilities-invoice') ? 'active' : '' }}">
                        <a class="nav-link"
                            href="{{ url('utilities-invoice') }}">Invoice</a>
                    </li>
                    <li class="{{ Request::is('utilities-subscribe') ? 'active' : '' }}">
                        <a href="{{ url('utilities-subscribe') }}">Subscribe</a>
                    </li>
                </ul>
            </li>
            <li class="{{ Request::is('credits') ? 'active' : '' }}">
                <a class="nav-link"
                    href="{{ url('credits') }}"><i class="fas fa-pencil-ruler">
                    </i> <span>Credits</span>
                </a>
            </li>
        </ul> --}}

            {{-- <div class="hide-sidebar-mini mt-4 mb-4 p-3">
            <a href="https://getstisla.com/docs"
                class="btn btn-primary btn-lg btn-block btn-icon-split">
                <i class="fas fa-rocket"></i> Documentation
            </a>
        </div> --}}
    </aside>
</div>
