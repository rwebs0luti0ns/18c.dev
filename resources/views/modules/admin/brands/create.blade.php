@extends('layouts.template')

@section('top-content')
<section class="content-header">
    <h1>
        CREATE BRAND
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{ url('admin/dashboard') }}"><i class="fa fa-home"></i> Home</a></li>
        <li><a href="{{ url('admin/brands') }}"><i class="fa fa-table"></i> Brands</a></li>
        <li class="active">Create page</li>
    </ol>
</section>
@stop

@section('content')

<form class="box box-solid" id="form-service" method="post" action="{{ url('admin/brands') }}">@csrf
    <div class="box-body row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 form-group">
            <label>Brand Name: <font color="red">*</font></label>
            <input type="text" class="form-control" value="{{ old('name') }}" name="name" required="" placeholder="Enter Brand Name">
        </div>
    </div>
    <div class="box-footer">
        <a href="{{ url('admin/brands') }}" class="btn btn-sm btn-flat btn-github">Back</a>
        <button type="submit" class="btn btn-sm btn-flat btn-success pull-right">Submit</button>
    </div>
</form>

@stop

@section('extend-js')
<script type="text/javascript">
$(document).ready(function() {
    $('body').delegate('#form-service', 'submit', function() {
        event.preventDefault();
        alertify.confirm("Are you sure that you want to submit?",
        function(){
            $('.preloader').show();
            $('#form-service').submit();
        },
        function(){
            alertify.error('Cancel');
        }).setHeader('<em> Warning! </em> ');    
    });
});
</script>
@stop
