@switch($active)

    @case('customer-page')

    <li>
        <a href="{{ url('franchisee/dashboard') }}"><i class="fa fa-home"></i> <span>Dashboard</span></a>
    </li>

    <li class="active">
        <a href="{{ url('franchisee/customers') }}"><i class="fa fa-briefcase"></i> <span>Customers</span></a>
    </li>

    @break

    @default

    <li class="active">
        <a href="{{ url('franchisee/dashboard') }}"><i class="fa fa-home"></i> <span>Dashboard</span></a>
    </li>

    <li>
        <a href="{{ url('franchisee/customers') }}"><i class="fa fa-briefcase"></i> <span>Customers</span></a>
    </li>

@endswitch

