<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>R Web Solutions Corp.</title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="stylesheet" href="{{ asset('css/admin.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="shortcut icon" href="{{ asset('images/favicon.ico') }}">
    @yield('extend-css')
</head>

<body class="hold-transition skin-green sidebar-mini">

    <div class="preloader">
        <div class="loader"></div>
    </div>

    <div class="wrapper">
        <header class="main-header">
            <a href="#" class="logo">
                <span class="logo-mini"><img src="{{ asset('images/sm-logo.png') }}"></span>
                <span class="logo-lg"><b>R</b> Web <b>Solutions</b></span>
            </a>
            <nav class="navbar navbar-static-top">
                <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </a>
                <div class="navbar-custom-menu">
                    <ul class="nav navbar-nav">
                        @if(Auth::guard('admin')->check())
                        <li>
                            <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" data-toggle="control-sidebar"><i class="fa fa-power-off"></i> Logout</a>
                            <form id="logout-form" action="{{ url('admin/logout') }}" method="POST" style="display: none;">@csrf</form>
                        </li>
                        @endif
                        @if(Auth::guard('franchisee')->check())
                        <li>
                            <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" data-toggle="control-sidebar"><i class="fa fa-power-off"></i> Logout</a>
                            <form id="logout-form" action="{{ url('franchisee/logout') }}" method="POST" style="display: none;">@csrf</form>
                        </li>
                        @endif
                    </ul>
                </div>
            </nav>
        </header>

        @extends('layouts.sidebar')

        <div class="content-wrapper">
            @yield('top-content')
            <section class="content">
                @if(session()->has('message'))
                <div class="alert alert-success alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <h4><i class="icon fa fa-check"></i> Success!</h4>
                    {{ session()->get('message') }}
                </div>
                @elseif(session()->has('error'))
                  <div class="alert alert-danger alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <h4><i class="icon fa fa-ban"></i> Alert!</h4>
                    {{ session()->get('error') }}
                  </div>
                @elseif($errors->all())
                  @foreach ($errors->all() as $error)
                  <div class="alert alert-danger alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <h4><i class="icon fa fa-ban"></i> Alert!</h4>
                        {{ $error }}
                  </div>
                  @endforeach
              @endif
            @yield('content')
            </section>
        </div>
    </div>

    <script src="{{ asset('js/admin.min.js') }}"></script>
    @yield('extend-js')
    <script>
    jQuery(document).ready(function($) {
        $('.preloader').hide(); 
        $('select').select2();
        $('.datepicker').datepicker({
            autoclose: true
        });

/*        var url = window.location;
        $('ul.sidebar-menu a').filter(function() {
            return this.href == url;
        }).parent().addClass('active');
        $('ul.treeview-menu a').filter(function() {
            return this.href == url;
         }).parentsUntil(".sidebar-menu > .treeview-menu").addClass('active');*/
    });
    </script>

</body>

</html>
