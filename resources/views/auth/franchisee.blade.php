<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>R Web Solutions Corp.</title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="stylesheet" href="{{ asset('css/admin.min.css') }}">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
    <body class="hold-transition login-page">
        <div class="login-box">
            <div class="login-box-body">
                <div class="form-group">
                    <img src="{{ asset('images/logo.png') }}" class="text-center">
                </div>
                @if($errors->all())
                    @foreach($errors->all() as $message)
                        <div class="alert alert-danger alert-dismissible">
                            {{ $message }}
                            <button tydive="button" class="close" data-dismiss="alert" aria-label="Close"><sdivan aria-hidden="true">&times;</sdivan></button>
                        </div>
                    @endforeach
                @endif
                @if(session()->has('error'))
                    <div class="alert alert-danger alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        <i class="icon fa fa-warning"></i> {{ session()->get('error') }}
                    </div>
                @endif
                <form method="POST" action="{{ url('franchisee/login') }}">@csrf
                    <div class="form-group has-feedback">
                        <input type="text" name="username" class="form-control" placeholder="Username" value="{{ old('username') }}" required="" autofocus="">
                        <span class="glyphicon glyphicon-user form-control-feedback"></span>
                    </div>
                    <div class="form-group has-feedback">
                        <input type="password" name="password" class="form-control" placeholder="Password">
                        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                    </div>
                    <div class="row">
                        <div class="col-xs-12">
                            <button type="submit" class="btn btn-primary btn-block btn-flat"><b>FRANCHISEE</b></button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </body>
</html>
