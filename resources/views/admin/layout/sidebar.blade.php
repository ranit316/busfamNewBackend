<!--start  Sidebar for desktop and tablet mobile-->
<ul class="navbar-nav sidebar sidebar-dark accordion desktop-sidebar" id="accordionSidebar">

    <a class="sidebar-brand d-flex align-items-center justify-content-sm-start" href="#">
        <div class="sidebar-brand-icon rotate-n-15">
            <!-- <i class="fas fa-laugh-wink"></i> -->
            <img src="{{ asset('asset/img/tarmac-logo.webp') }}" alt="" class="img-fluid">
        </div>
        {{-- <div class="sidebar-brand-text mx-2">Tarmac Motor</div> --}}
    </a>

    <div class="toggle_button d-md-inline" id="toggle_button_sidebar">
        <button id="sidebarToggle" class="" type="button">
            <i class="fa-solid fa-xmark"></i>
        </button>
    </div>

    <!-- links for desktop -->
    <div class="desktop_sidebar_links">
        <li class="nav-item active">
            <a class="nav-link" href="{{ route('dashboard') }}">
                <i class="fa-solid fa-house"></i>
                <span>Dashboard</span></a>
        </li>
        {{-- <li class="nav-item">
            <a class="nav-link" href="{{ route('company.index') }}">
                <i class="fa-regular fa-circle-play"></i>
                <span>Company</span></a>
        </li> --}}


        <li class="nav-item">
            <a class="nav-link" href="{{ route('admin.banners.index') }}">
                <i class="fa-regular fa-circle-play"></i>
                <span>Banner</span></a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('admin.pages.index') }}">
                <i class="fa-regular fa-circle-play"></i>
                <span>Pages</span></a>
        </li>



        <li class="nav-item">
            <a class="nav-link" href="#" data-bs-toggle="collapse" data-bs-target="#c1" aria-expanded="false"
                aria-controls="c1">
                <i class="fa-solid fa-user-gear"></i>
                <span>Item Manager</span>
            </a>
            <ul id="c1" class="collapse collapse-inner rounded" aria-labelledby="headingUtilities"
                data-bs-parent="#accordionSidebar">

                <li class="collapse-item">
                    <div class="subhead">Item Manager</div>
                </li>

                <li class="collapse-item">
                    <a href="#"><i class="fa-regular fa-circle-play"></i> Item</a>
                </li>

                {{-- <li class="collapse-item">
                    <a href="{{ route('items.index') }}"><i class="fa-regular fa-circle-play"></i>Item</a>
                </li> --}}

                <li class="collapse-item">
                    <a href="#"><i class="fa-regular fa-circle-play"></i> Categories</a>
                </li>

            </ul>
        </li>


        <li class="nav-item">
            <a class="nav-link" href="#" data-bs-toggle="collapse" data-bs-target="#c2" aria-expanded="false"
                aria-controls="c2">
                <i class="fa-solid fa-user-gear"></i>
                <span>Stock Manager</span>
            </a>
            <ul id="c2" class="collapse collapse-inner rounded" aria-labelledby="headingUtilities"
                data-bs-parent="#accordionSidebar">

                <li class="collapse-item">
                    <div class="subhead">Stock Manager</div>
                </li>

                <li class="collapse-item">
                    <a href="#"><i class="fa-regular fa-circle-play"></i> Stock</a>
                </li>



                <li class="collapse-item">
                    <a href="#"><i class="fa-regular fa-circle-play"></i> Add Inventory</a>
                </li>

                {{-- <li class="collapse-item">
                        <a href=""><i class="fa-regular fa-circle-play"></i> Categories</a>
                    </li> --}}

            </ul>
        </li>


        <li class="nav-item">
            <a class="nav-link" href="#">
                <i class="fa-solid fa-gear"></i>
                <span>GRN</span></a>
        </li>


        <li class="nav-item">
            <a class="nav-link" href="#" data-bs-toggle="collapse" data-bs-target="#userManeger"
                aria-expanded="false" aria-controls="userManeger">
                <i class="fa-solid fa-user-gear"></i>
                <span>User Manager</span>
            </a>
            <ul id="userManeger" class="collapse collapse-inner rounded" aria-labelledby="headingUtilities"
                data-bs-parent="#accordionSidebar">

                <li class="collapse-item">
                    <div class="subhead">User</div>
                </li>

                <li class="collapse-item">
                    <a href="#"><i class="fa-solid fa-user"></i> Users</a>
                </li>

                <li class="collapse-item">
                    <a href="#"><i class="fa-regular fa-circle-play"></i> Role</a>
                </li>

                {{-- <li class="collapse-item">
                    <a href="{{ route('items.index') }}"><i class="fa-regular fa-circle-play"></i>Item</a>
                </li> --}}

                <li class="collapse-item">
                    <a href="#"><i class="fa-regular fa-circle-play"></i> Permission</a>
                </li>

            </ul>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="{{ route('admin.setting.webSettig') }}">
                <i class="fa-solid fa-chart-pie"></i>
                <span>Setting</span></a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="#" data-bs-toggle="collapse" data-bs-target="#leadManager"
                aria-expanded="false" aria-controls="leadManager">
                <i class="fa-solid fa-user-gear"></i>
                <span>Lead Manager</span>
            </a>
            <ul id="leadManager" class="collapse list-unstyled ps-3" data-bs-parent="#accordionSidebar">
                <li class="nav-subtitle">
                    <span class="subhead">Lead</span>
                </li>
                <li>
                    <a class="collapse-item" href="#">
                        <i class="fa-solid fa-user"></i> Leads
                    </a>
                </li>
                <li>
                    <a class="collapse-item" href="#">
                        <i class="fa-regular fa-circle-play"></i> Conversation
                    </a>
                </li>
                {{-- 
        <li>
            <a class="collapse-item" href="#">
                <i class="fa-regular fa-circle-play"></i> Permission
            </a>
        </li>
        --}}
            </ul>
        </li>

    </div>
    <!-- links for desktop -->

    <!-- links for mobiles -->
    <div class="mobile_sidebar_links">
        <li class="nav-item active">
            <a class="nav-link" href="#">
                <i class="fa-solid fa-house"></i>
                <span>Dashboard</span></a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#">
                <i class="fa-regular fa-circle-play"></i>
                <span>Media</span></a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="#">
                <i class="fa-solid fa-user-gear"></i>
                <span>Item Manager</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="#">
                <i class="fa-solid fa-user-gear"></i>
                <span>List Manager</span>
            </a>
        </li>


        <li class="nav-item">
            <a class="nav-link" href="#">
                <i class="fa-solid fa-gear"></i>
                <span>Settings</span></a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="#">
                <i class="fa-solid fa-chart-pie"></i>
                <span>Business Graph</span></a>
        </li>
    </div>
    <!-- links for mobiles -->

    <div class="text-center d-none d-md-inline mt-4">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>
</ul>

<!-- End Sidebar for desktop and tablet mobile-->
