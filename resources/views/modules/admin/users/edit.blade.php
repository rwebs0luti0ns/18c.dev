@extends('layouts.template')

@section('top-content')
<section class="content-header">
    <h1>
        UPDATE USER
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{ url('admin/dashboard') }}"><i class="fa fa-home"></i> Home</a></li>
        <li><a href="{{ url('admin/franchisees') }}"><i class="fa fa-users"></i> Franchisees</a></li>
        <li><a href="{{ url('admin/franchisees/'.$user->franchisee_id) }}"> Franchisee</a></li>
        <li class="active">Update User</li>
    </ol>
</section>
@stop
@section('content')
   <form class="box box-solid" method="post" action="{{ url('admin/franchisees/'.$user->id) }}/userUpdate" id="updateForm">@csrf
       <div class="box-body row">
             <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 form-group">
                <label>Name: <font color="red">*</font></label>
                <input type="text" class="form-control" value="{{ $user->name }}" name="name" required="" placeholder="Enter Name">
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 form-group">
                <label>Username: <font color="red">*</font></label>
                <input type="text" class="form-control" value="{{ $user->username }}" name="username" required="" placeholder="Enter Username">
            </div>
       </div>
       <div class="box-footer">
            <a href="{{ url('admin/franchisees/'.$user->franchisee_id)}}" class="btn btn-sm btn-flat btn-github">Back</a>
            <button type="submit" class="btn btn-sm btn-success btn-flat pull-right">Submit</button>
       </div>
   </form>
@stop


@section('extend-js')
<script type="text/javascript">
  $(document).ready(function() {
    $('body').delegate('#updateForm', 'submit', function() {
        event.preventDefault();
        alertify.confirm("Are you sure that you want to submit?",
        function(){
            $('.preloader').show();
            $('#updateForm').submit();
        },
        function(){
            alertify.error('Cancel');
        }).setHeader('<em> Warning! </em> ');
    });
});
</script>
@stop
