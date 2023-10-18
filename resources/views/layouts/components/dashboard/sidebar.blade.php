<aside class="sidebar-wrapper" data-simplebar="true">
    <div class="sidebar-header">
        <div>
            <img src="{{ asset('dashboard/assets/images/logo-icon.png') }}" class="logo-icon" alt="logo icon">
        </div>
        <div>
            <h4 class="logo-text">Onedash</h4>
        </div>
        <div class="toggle-icon ms-auto"> <i class="bi bi-list"></i>
        </div>
    </div>
    <!--navigation-->
    <ul class="metismenu" id="menu">

        <li>
            <a href="{{ route('dashboard.admin') }}"
                class="{{ $active == 'dashboard' ? 'active-menu mm-active text-primary' : '' }}">
                <div class="parent-icon"><i class="bi bi-house-fill"></i></div>
                <div class="menu-title">Dashboard</div>
            </a>
        </li>

        @can('role-list')
            <li>
                <a href="{{ route('dashboard.roles.index') }}"
                    class="{{ $active == 'roles-user' ? 'active-menu mm-active text-primary' : '' }}">
                    <div class="parent-icon"><i class="bi bi-person-check-fill"></i>
                    </div>
                    <div class="menu-title">User Role Permission</div>
                </a>
            </li>
        @endcan

        @can('users-list')
            <li>
                <a href="javascript:;"
                    class="has-arrow {{ $active == 'users' ? 'active-menu mm-active text-primary' : '' }}">
                    <div class="parent-icon"><i class="bi bi-people-fill"></i>
                    </div>
                    <div class="menu-title">User</div>
                </a>
                <ul>
                    <li>
                        <a href="{{ route('dashboard.users.index') }}"
                            class="{{ $active == 'users' ? 'active-menu mm-active text-primary' : '' }}"><i
                                class="bi bi-circle"></i>All User</a>
                    </li>
                    <li>
                        <a href="{{ url('#') }}"><i class="bi bi-circle"></i>User Admin</a>
                    </li>
                    <li>
                        <a href="{{ url('#') }}"><i class="bi bi-circle"></i>User Pengguna</a>
                    </li>
                    <li>
                        <a href="{{ route('dashboard.user_location.index') }}"><i class="bi bi-circle"></i>User
                            Location</a>
                    </li>
                </ul>
            </li>
        @endcan

        @can('category-list')
            <li class="">
                <a href="{{ route('dashboard.category.index') }}"
                    class="{{ $active == 'category' ? 'active-menu mm-active text-primary' : '' }}">
                    <div class="parent-icon"><i class="bi bi-tags-fill"></i>
                    </div>
                    <div class="menu-title">Categories</div>
                </a>
            </li>
        @endcan


        @can('survey-list')
            <li class="">
                <a href="{{ route('dashboard.survey.index') }}"
                    class="{{ $active == 'survey' ? 'active-menu mm-active text-primary' : '' }}">
                    <div class="parent-icon"><i class="bi bi-pin-map-fill"></i>
                    </div>
                    <div class="menu-title">Survey</div>
                </a>
            </li>
        @endcan

        <li>
            <a href="pages-pricing-tables.html">
                <div class="parent-icon"><i class="bi bi-tags-fill"></i>
                </div>
                <div class="menu-title">Pricing Tables</div>
            </a>
        </li>

        <li>
            <a href="{{ route('dashboard.survey_histories.index') }}">
                <div class="parent-icon"><i class="bi bi-clock-history"></i></i>
                </div>
                <div class="menu-title">Survey Historie</div>
            </a>
        </li>


        <li class="menu-label">Others</li>
        <li>
            <a class="has-arrow" href="javascript:;">
                <div class="parent-icon"><i class="bi bi-music-note-list"></i>
                </div>
                <div class="menu-title">Menu Levels</div>
            </a>
            <ul>
                <li> <a class="has-arrow" href="javascript:;"><i class="bi bi-circle"></i>Level One</a>
                    <ul>
                        <li> <a class="has-arrow" href="javascript:;"><i class="bi bi-circle"></i>Level
                                Two</a>
                            <ul>
                                <li> <a href="javascript:;"><i class="bi bi-circle"></i>Level Three</a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </li>
            </ul>
        </li>
    </ul>
    <!--end navigation-->
</aside>


<style>
    .active-menu,
    .active-menu:hover,
    .active-menu:focus,
    .active-menu:active,
    .active-menu>a,
    .active-menu>a:hover,
    .active-menu>a:focus,
    .active-menu>a:active {
        color: #007bff;
        /* Ini adalah contoh kode warna biru */
        text-decoration: none;
        background-color: rgb(255 255 255);
        /* border-left: 0.25rem solid #3461ff; */
        border-radius: 0.25rem;
        /* Sudut melengkung */
        box-shadow: 0 0.125rem 0.25rem rgb(0 0 0 / 8%);
    }
</style>
