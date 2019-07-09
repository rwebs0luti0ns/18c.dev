@extends('layouts.template')

@section('top-content')
<section class="content-header">
    <h1>
        EDIT BRAND
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{ url('admin/dashboard') }}"><i class="fa fa-home"></i> Home</a></li>
        <li><a href="{{ url('admin/brands') }}"><i class="fa fa-table"></i> Brands</a></li>
        <li class="active">Edit page</li>
    </ol>
</section>
@stop

@section('content')

<form class="box box-solid" id="form-brand" method="post" action="{{ url('admin/brands/'.$brand->id) }}">@csrf @method('put')
    <div class="box-body row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 form-group">
            <label>Brand Name: <font color="red">*</font></label>
            <input type="text" class="form-control" value="{{ $brand->name }}" name="name" required="" placeholder="Enter Brand Name">
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
    $('body').delegate('#form-brand', 'submit', function() {
        event.preventDefault();
        alertify.confirm("Are you sure that you want to submit?",
        function(){
            $('.preloader').show();
            $('#form-brand').submit();
        },
        function(){
            alertify.error('Cancel');
        }).setHeader('<em> Warning! </em> ');    
    });
});
</script>
@stop
