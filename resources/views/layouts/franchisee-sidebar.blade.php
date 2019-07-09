@switch($active)

    @case('category-page')


    @break

    @default

    <li class="active">
        <a href="{{ url('franchisee/dashboard') }}"><i class="fa fa-home"></i> <span>Dashboard</span></a>
    </li>

@endswitch

