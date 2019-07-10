@extends('layouts.template')

@section('top-content')
<section class="content-header">
    <h1>
        CREATE FRANCHISEE
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{ url('admin/dashboard') }}"><i class="fa fa-home"></i> Home</a></li>
        <li><a href="{{ url('admin/franchisees') }}"><i class="fa fa-table"></i> Franchisees</a></li>
        <li class="active">Create page</li>
    </ol>
</section>
@stop

@section('content')

<form class="box box-solid" id="form-franchisee" method="post" action="{{url('admin/franchisees')}}">@csrf
    <div class="box-body row">
        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 form-group">
            <label>ID Code: <font color="red">*</font></label>
            <input type="text" class="form-control" value="{{ old('id_code') }}" name="id_code" required="" placeholder="Enter ID Code">
        </div>
        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 form-group">
            <label>Area Code: <font color="red">*</font></label>
            <input type="text" class="form-control" value="{{ old('area_code') }}" name="area_code" required="" placeholder="Enter ID Code">
        </div>
        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 form-group">
            <label>Owner Name: <font color="red">*</font></label>
            <input type="text" class="form-control" value="{{ old('owner') }}" name="owner" required="" placeholder="Enter Owner Name">
        </div>
        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 form-group">
            <label>Company Name: <font color="red">*</font></label>
            <input type="text" class="form-control" value="{{ old('company_name') }}" name="company_name" required="" placeholder="Enter Company Name">
        </div>
        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 form-group">
            <label>Date Started: <font color="red">*</font></label>
            <input type="text" class="form-control datepicker" value="{{ old('date_started') }}" name="date_started" required="" placeholder="  MM/DD/YYYY">
        </div>
    </div>
    <div class="box-footer">
        <a href="{{ url('admin/franchisees') }}" class="btn btn-sm btn-flat btn-github">Back</a>
        <button type="submit" class="btn btn-sm btn-flat btn-success pull-right">Submit</button>
    </div>
</form>

@stop

@section('extend-js')
<script type="text/javascript">
$(document).ready(function() {
    $('body').delegate('#form-franchisee', 'submit', function() {
        event.preventDefault();
        alertify.confirm("Are you sure that you want to submit?",
        function(){
            $('.preloader').show();
            $('#form-franchisee').submit();
        },
        function(){
            alertify.error('Cancel');
        }).setHeader('<em> Warning! </em> ');    
    });
});
</script>
@stop
