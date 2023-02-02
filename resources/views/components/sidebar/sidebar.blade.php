<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
        <li class="nav-item">
            <a class="nav-link" href="{{ route('home') }}">
                <i class="mdi mdi-home menu-icon"></i>
                <span class="menu-title">Dashboard</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#ui-basic" aria-expanded="false"
                aria-controls="ui-basic">
                <i class="mdi mdi-view-headline menu-icon"></i>
                <span class="menu-title">Invoice System</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-basic">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="{{ route('orders') }}">View Orders</a></li>
                    <li class="nav-item"> <a class="nav-link" href="{{ route('add-order') }}">Add Order</a>
                    </li>
                </ul>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#delivery-basic" aria-expanded="false"
                aria-controls="ui-basic">
                <i class="mdi mdi-file-document-box-outline menu-icon"></i>
                <span class="menu-title">Delivery System</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="delivery-basic">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="{{ route('all-deliveries') }}">View Delivery</a></li>
                    <li class="nav-item"> <a class="nav-link" href="{{ route('add-delivery') }}">Add Delivery</a>
                    </li>
                </ul>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#delivery-company" aria-expanded="false"
                aria-controls="ui-basic">
                <i class="mdi mdi mdi-ambulance menu-icon"></i>
                <span class="menu-title">Delivery Company</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="delivery-company">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="{{ route('delivery-company') }}">View Delivery Company</a></li>
                    <li class="nav-item"> <a class="nav-link" href="{{ route('add-company') }}">Add Delivery Company</a>
                    </li>
                </ul>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#profile-basic" aria-expanded="false"
                aria-controls="ui-basic">
                <i class="mdi mdi-account menu-icon"></i>
                <span class="menu-title">Profile</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="profile-basic">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="{{ route('profile') }}">Profile</a></li>
                    <li class="nav-item"> <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a></li>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST"></form>
                </ul>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="pages/charts/chartjs.html">
                <i class="mdi mdi-chart-pie menu-icon"></i>
                <span class="menu-title">Charts</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="pages/tables/basic-table.html">
                <i class="mdi mdi-grid-large menu-icon"></i>
                <span class="menu-title">Tables</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="pages/icons/mdi.html">
                <i class="mdi mdi-emoticon menu-icon"></i>
                <span class="menu-title">Icons</span>
            </a>
        </li>
    </ul>
</nav>
