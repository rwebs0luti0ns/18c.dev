@extends('layouts.template')

@section('top-content')
<section class="content-header">
    <h1>
        SHOW CUSTOMER
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{ url('franchisee/dashboard') }}"><i class="fa fa-home"></i> Home</a></li>
        <li><a href="{{ url('franchisee/customers') }}"><i class="fa fa-table"></i> Customers</a></li>
        <li class="active">Create page</li>
    </ol>
</section>
@stop
@section('content')

<div class="row">
    <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
       <div class="box box-solid">
           <div class="box-body">
                 <div class="form-group">
                    <label>Name:</label>
                    <input type="text" class="form-control" value="{{ $customer->name }}" readonly="">
                </div>
                 <div class="form-group">
                    <label>Contact:</label>
                    <input type="text" class="form-control" value="{{ $customer->contact_no }}" readonly="">
                </div>
                 <div class="form-group">
                    <label>Email:</label>
                    <input type="email" class="form-control" value="{{ $customer->email }}" readonly="">
                </div>
                 <div class="form-group">
                    <label>Address:</label>
                    <textarea class="form-control" readonly="" rows="4">{{ $customer->address }}</textarea>
                </div>
                 <div class="form-group">
                    <label>Remarks:</label>
                    <textarea class="form-control" readonly="" rows="4">{{ $customer->remarks }}</textarea>
                </div>
           </div>
           <div class="box-footer">
                <a href="{{ url('franchisee/customers')}}" class="btn btn-sm btn-flat btn-github">Back</a>
                <a href="{{ url('franchisee/customers/'.$customer->id)}}/edit" class="btn btn-sm btn-flat btn-primary pull-right">Edit</a>
           </div>
       </div>
    </div>
    <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12"></div>
</div>



@stop

@section('extend-js')
<script type="text/javascript">
$(document).ready(function() {

});
</script>
@stop
