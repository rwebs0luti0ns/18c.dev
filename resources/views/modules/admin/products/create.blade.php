@extends('layouts.template')

@section('top-content')
<section class="content-header">
    <h1>
        CREATE PRODUCT
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{ url('admin/dashboard') }}"><i class="fa fa-home"></i> Home</a></li>
        <li><a href="{{ url('admin/products') }}"><i class="fa fa-table"></i> Products</a></li>
        <li class="active">Create page</li>
    </ol>
</section>
@stop

@section('content')

<form class="box box-solid" id="form-product" method="post" action="{{ url('admin/products') }}">@csrf
    <div class="box-body row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 form-group">
            <label>Product Name: <font color="red">*</font></label>
            <input type="text" class="form-control" value="{{ old('name') }}" name="name" required="" placeholder="Enter Product Name">
        </div>
    </div>
    <div class="box-footer">
        <a href="{{ url('admin/products') }}" class="btn btn-sm btn-flat btn-github">Back</a>
        <button type="submit" class="btn btn-sm btn-flat btn-success pull-right">Submit</button>
    </div>
</form>

@stop

@section('extend-js')
<script type="text/javascript">
$(document).ready(function() {
    $('body').delegate('#form-product', 'submit', function() {
        event.preventDefault();
        alertify.confirm("Are you sure that you want to submit?",
        function(){
            $('.preloader').show();
            $('#form-product').submit();
        },
        function(){
            alertify.error('Cancel');
        }).setHeader('<em> Warning! </em> ');    
    });
});
</script>
@stop
