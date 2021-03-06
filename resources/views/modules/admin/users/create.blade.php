@extends('layouts.template')

@section('top-content')
<section class="content-header">
    <h1>
        CREATE USER
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{ url('admin/dashboard') }}"><i class="fa fa-home"></i> Home</a></li>
        <li><a href="{{ url('admin/franchisees') }}"><i class="fa fa-users"></i> Franchisees</a></li>
        <li><a href="{{ url('admin/franchisees/'.$id) }}"> Franchisee</a></li>
        <li class="active">Create User</li>
    </ol>
</section>
@stop
@section('content')
   <form class="box box-solid" method="post" action="{{ url('admin/franchisees/'.$id) }}/store" id="addUserForm">@csrf
       <div class="box-body row">
             <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 form-group">
                <label>Name: <font color="red">*</font></label>
                <input type="text" class="form-control" value="{{ old('name') }}" name="name" required="" placeholder="Enter Name">
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 form-group">
                <label>Username: <font color="red">*</font></label>
                <input type="text" class="form-control" value="{{ old('username') }}" name="username" required="" placeholder="Enter Username">
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                <label>Password: <font color="red">*</font></label>
                <input type="password" class="form-control" value="{{ old('passowrd') }}" name="password" required="" placeholder="Enter password">
            </div>
       </div>
       <div class="box-footer">
            <a href="{{ url('admin/franchisees/'.$id)}}" class="btn btn-sm btn-flat btn-github">Back</a>
            <button type="submit" class="btn btn-sm btn-success btn-flat pull-right">Submit</button>
       </div>
   </form>
@stop

@section('extend-js')
<script type="text/javascript">
  $(document).ready(function() {
    $('body').delegate('#addUserForm', 'submit', function() {
        event.preventDefault();
        alertify.confirm("Are you sure that you want to submit?",
        function(){
            $('.preloader').show();
            $('#addUserForm').submit();
        },
        function(){
            alertify.error('Cancel');
        }).setHeader('<em> Warning! </em> ');
    });
});
</script>
@stop
