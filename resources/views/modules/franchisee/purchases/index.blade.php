@extends('layouts.template')

@section('top-content')
<section class="content-header">
    <h1>
        PURCHASE ORDER
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{ url('franchisee/dashboard') }}"><i class="fa fa-home"></i> Home</a></li>
        <li class="active"><a href="{{ url('franchisee/customers') }}"><i class="fa fa-users"></i> Purchase</a></li>
    </ol>
</section>
@stop
@section('content')

@stop
