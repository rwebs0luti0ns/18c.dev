@extends('layouts.template')

@section('top-content')
<section class="content-header">
    <h1>
        EDIT CUSTOMER
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{ url('franchisee/dashboard') }}"><i class="fa fa-home"></i> Home</a></li>
        <li><a href="{{ url('franchisee/customers') }}"><i class="fa fa-table"></i> Customers</a></li>
        <li><a href="{{ url('franchisee/customers/'.$customer->id) }}"> Show page</a></li>
        <li class="active">Edit page</li>
    </ol>
</section>
@stop
@section('content')
   <form class="box box-solid" method="post" action="{{ url('franchisee/customers/'.$customer->id) }}" id="customer-form">@csrf @method('put')
       <div class="box-body row">
             <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 form-group">
                <label>Name: <font color="red">*</font></label>
                <input type="text" class="form-control" value="{{ $customer->name }}" name="name" required="" placeholder="Enter Name">
            </div>
             <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 form-group">
                <label>Contact: <font color="red">*</font></label>
                <input type="text" class="form-control" value="{{ $customer->contact_no }}" name="contact_no" required="" placeholder="Enter Name">
            </div>
             <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 form-group">
                <label>Email: <font color="red">*</font></label>
                <input type="email" class="form-control" value="{{ $customer->email }}" name="email" required="" placeholder="Enter Name">
            </div>
             <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 form-group">
                <label>Address: <font color="red">*</font></label>
                <textarea class="form-control" name="address" required="">{{ $customer->address }}</textarea>
            </div>
             <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 form-group">
                <label>Remarks: <font color="red">*</font></label>
                <textarea class="form-control" name="remarks">{{ $customer->remarks }}</textarea>
            </div>
       </div>
       <div class="box-footer">
            <a href="{{ url('franchisee/customers/'.$customer->id)}}" class="btn btn-sm btn-flat btn-github">Back</a>
            <button type="submit" class="btn btn-sm btn-success btn-flat pull-right">Submit</button>
       </div>
   </form>
@stop

@section('extend-js')
<script type="text/javascript">
  $(document).ready(function() {
    $('body').delegate('#customer-form', 'submit', function() {
        event.preventDefault();
        alertify.confirm("Are you sure that you want to submit?",
        function(){
            $('.preloader').show();
            $('#customer-form').submit();
        },
        function(){
            alertify.error('Cancel');
        }).setHeader('<em> Warning! </em> ');
    });
});
</script>
@stop
