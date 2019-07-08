<aside class="main-sidebar">
    <section class="sidebar">
        <div class="user-panel">
            <div class="pull-left image">
                <img src="{{ asset('images/128x128.png') }}" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                @if(Auth::guard('admin')->check())
                <p>{{ Auth::guard('admin')->user()->name }}</p>
                <a href="#"><i class="fa fa-circle text-success"></i> {{ Auth::guard('admin')->user()->role }}</a>
                @endif
                @if(Auth::guard('franchisee')->check())
                <p>{{ Auth::guard('franchisee')->user()->name }}</p>
                <a href="#"><i class="fa fa-circle text-success"></i> {{ Auth::guard('franchisee')->user()->role }}</a>
                @endif
            </div>
        </div>
        <ul class="sidebar-menu" data-widget="tree">

            @if(Auth::guard('admin')->check())

                @if($active == 'dashboard')

                <li class="active">
                    <a href="{{ url('admin/dashboard') }}"><i class="fa fa-home"></i> <span>Dashboard</span></a>
                </li>

                @elseif($active == 'not')

                @else

                @endif
            
            @endif

            @if(Auth::guard('franchisee')->check())

                @if($active == 'dashboard')

                <li class="active">
                    <a href="{{ url('franchisee/dashboard') }}"><i class="fa fa-home"></i> <span>Dashboard</span></a>
                </li>

                @elseif($active == 'not')

                @else

                @endif

            @endif
        </ul>
    </section>
</aside>