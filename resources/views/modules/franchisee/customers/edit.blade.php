@extends('layouts.template')

@section('top-content')
<section class="content-header">
    <h1>
        EDIT FRANCHISEE
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{ url('franchisee/dashboard') }}"><i class="fa fa-home"></i> Home</a></li>
        <li><a href="{{ url('franchisee/customers') }}"><i class="fa fa-table"></i> Franchisees</a></li>
        <li class="active">Edit page</li>
    </ol>
</section>
@stop
@section('content')
<form class="box box-solid" id="form-franchisee" method="post" action="{{ url('franchisee/customers/'.$customer->id) }}">@csrf @method('put')
     <div class="box-body row">
        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 form-group">
            <label>Name:<font color="red">*</font></label>
            <input type="text" class="form-control" value="{{ $customer->name }}" name="name" required="" placeholder="Enter Customer Name">
        </div>
        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 form-group">
            <label>Contact: <font color="red">*</font></label>
            <input type="number" class="form-control" value="{{ $customer->contact }}" name="contact" required="" placeholder="Enter Phone Number">
        </div>
        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 form-group">
            <label>Email Address: <font color="red">*</font></label>
            <input type="email" class="form-control" value="{{ $customer->email }}" name="email" required="" placeholder="Enter Email Address">
        </div>
        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 form-group">
            <label>Address: <font color="red">*</font></label>
            <input type="text" class="form-control" value="{{ $customer->address }}" name="address" required="" placeholder="Enter Customer Address">
        </div>
    </div>
    <div class="box-footer">
        <a href="{{ url('franchisee/customers/') }}" class="btn btn-sm btn-flat btn-github">Back</a>
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
