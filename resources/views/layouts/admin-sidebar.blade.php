@switch($active)

    @case('brand-page')
    {{-- BRAND SIDEBAR PAGE --}}

    <li>
        <a href="{{ url('admin/dashboard') }}"><i class="fa fa-home"></i> <span>Dashboard</span></a>
    </li>

    <li class="active treeview menu-open">
        <a href="#"><i class="fa fa-link"></i> <span>System Management</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
            </span>
        </a>
        <ul class="treeview-menu">
            <li class="active"><a href="{{ url('admin/brands') }}"><i class="fa fa-cog"></i> Brands</a></li>
            <li><a href="{{ url('admin/categories') }}"><i class="fa fa-cog"></i> Categories</a></li>
            <li><a href="{{ url('admin/products') }}"><i class="fa fa-cog"></i> Products</a></li>
            <li><a href="{{ url('admin/unit-capacities') }}"><i class="fa fa-cog"></i> Unit Capacities</a></li>
        </ul>
    </li>

    @break

    @case('category-page')
    {{-- CATEGORY SIDEBAR PAGE --}}

    <li>
        <a href="{{ url('admin/dashboard') }}"><i class="fa fa-home"></i> <span>Dashboard</span></a>
    </li>

    <li class="active treeview menu-open">
        <a href="#"><i class="fa fa-link"></i> <span>System Management</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
            </span>
        </a>
        <ul class="treeview-menu">
            <li><a href="{{ url('admin/brands') }}"><i class="fa fa-cog"></i> Brands</a></li>
            <li class="active"><a href="{{ url('admin/categories') }}"><i class="fa fa-cog"></i> Categories</a></li>
            <li><a href="{{ url('admin/products') }}"><i class="fa fa-cog"></i> Products</a></li>
            <li><a href="{{ url('admin/unit-capacities') }}"><i class="fa fa-cog"></i> Unit Capacities</a></li>
        </ul>
    </li>

    @break

    @case('product-page')
    {{-- PRODUCT SIDEBAR PAGE --}}

    <li>
        <a href="{{ url('admin/dashboard') }}"><i class="fa fa-home"></i> <span>Dashboard</span></a>
    </li>

    <li class="active treeview menu-open">
        <a href="#"><i class="fa fa-link"></i> <span>System Management</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
            </span>
        </a>
        <ul class="treeview-menu">
            <li><a href="{{ url('admin/brands') }}"><i class="fa fa-cog"></i> Brands</a></li>
            <li><a href="{{ url('admin/categories') }}"><i class="fa fa-cog"></i> Categories</a></li>
            <li class="active"><a href="{{ url('admin/products') }}"><i class="fa fa-cog"></i> Products</a></li>
            <li><a href="{{ url('admin/unit-capacities') }}"><i class="fa fa-cog"></i> Unit Capacities</a></li>
        </ul>
    </li>

    @break

    @case('unit-capacity-page')
    {{-- PRODUCT SIDEBAR PAGE --}}

    <li>
        <a href="{{ url('admin/dashboard') }}"><i class="fa fa-home"></i> <span>Dashboard</span></a>
    </li>

    <li class="active treeview menu-open">
        <a href="#"><i class="fa fa-link"></i> <span>System Management</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
            </span>
        </a>
        <ul class="treeview-menu">
            <li><a href="{{ url('admin/brands') }}"><i class="fa fa-cog"></i> Brands</a></li>
            <li><a href="{{ url('admin/categories') }}"><i class="fa fa-cog"></i> Categories</a></li>
            <li><a href="{{ url('admin/products') }}"><i class="fa fa-cog"></i> Products</a></li>
            <li class="active"><a href="{{ url('admin/unit-capacities') }}"><i class="fa fa-cog"></i> Unit Capacities</a></li>
        </ul>
    </li>

    @break


    @default
    {{-- DASHBOARD SIDEBAR PAGE --}}

    <li class="active">
        <a href="{{ url('admin/dashboard') }}"><i class="fa fa-home"></i> <span>Dashboard</span></a>
    </li>

    <li class="treeview ">
        <a href="#"><i class="fa fa-link"></i> <span>System Management</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
            </span>
        </a>
        <ul class="treeview-menu">
            <li><a href="{{ url('admin/brands') }}"><i class="fa fa-cog"></i> Brands</a></li>
            <li><a href="{{ url('admin/categories') }}"><i class="fa fa-cog"></i> Categories</a></li>
            <li><a href="{{ url('admin/products') }}"><i class="fa fa-cog"></i> Products</a></li>
            <li><a href="{{ url('admin/unit-capacities') }}"><i class="fa fa-cog"></i> Unit Capacities</a></li>
        </ul>
    </li>

@endswitch
