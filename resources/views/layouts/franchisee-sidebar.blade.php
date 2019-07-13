@switch($active)

    @case('category-page')


    @break

    @case('customer-page')
        <li class="">
            <a href="{{ url('franchisee/dashboard') }}"><i class="fa fa-home"></i> <span>Dashboard</span></a>
        </li>

        <li class="active">
            <a href="{{ url('franchisee/customers') }}"><i class="fa fa-home"></i> <span>Customer</span></a>
        </li>
        <li class="">
            <a href="{{ url('franchisee/purchases') }}"><i class="fa fa-home"></i> <span>Purchase Order</span></a>
        </li>
        <li class="">
            <a href="{{ url('franchisee/quotations') }}"><i class="fa fa-home"></i> <span>Quotation</span></a>
        </li>
    @break

    @case('purchase-page')
        <li class="">
            <a href="{{ url('franchisee/dashboard') }}"><i class="fa fa-home"></i> <span>Dashboard</span></a>
        </li>

        <li class="">
            <a href="{{ url('franchisee/customers') }}"><i class="fa fa-home"></i> <span>Customer</span></a>
        </li>
        <li class="active">
            <a href="{{ url('franchisee/purchases') }}"><i class="fa fa-home"></i> <span>Purchase Order</span></a>
        </li>
        <li class="">
            <a href="{{ url('franchisee/quotations') }}"><i class="fa fa-home"></i> <span>Quotation</span></a>
        </li>
    @break
    @case('quotation-page')
        <li class="">
            <a href="{{ url('franchisee/dashboard') }}"><i class="fa fa-home"></i> <span>Dashboard</span></a>
        </li>

        <li class="">
            <a href="{{ url('franchisee/customers') }}"><i class="fa fa-home"></i> <span>Customer</span></a>
        </li>
        <li class="">
            <a href="{{ url('franchisee/purchases') }}"><i class="fa fa-home"></i> <span>Purchase Order</span></a>
        </li>
        <li class="active">
            <a href="{{ url('franchisee/quotations') }}"><i class="fa fa-home"></i> <span>Quotation</span></a>
        </li>
    @break

    @default
        <li class="active">
            <a href="{{ url('franchisee/dashboard') }}"><i class="fa fa-home"></i> <span>Dashboard</span></a>
        </li>
        <li class="">
            <a href="{{ url('franchisee/customers') }}"><i class="fa fa-home"></i> <span>Customer</span></a>
        </li>
        <li class="">
            <a href="{{ url('franchisee/purchases') }}"><i class="fa fa-home"></i> <span>Purchase Order</span></a>
        </li>
        <li class="">
            <a href="{{ url('franchisee/quotations') }}"><i class="fa fa-home"></i> <span>Quotation</span></a>
        </li>
@endswitch

