@extends('layouts.template')

@section('top-content')
<section class="content-header">
    <h1>
        FRANCHISEE DETAILS
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{ url('admin/dashboard') }}"><i class="fa fa-home"></i> Home</a></li>
        <li><a href="{{ url('admin/franchisees') }}"><i class="fa fa-users"></i> Franchisees</a></li>
        <li class="active">View page</li>
    </ol>
</section>
@stop

@section('content')
<div class="row">
    <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
        <div class="box box-success">
            <div class="box-body">
                <div class="form-group m-t-0">
                    <label>ID Code</label>
                    <input type="text" class="form-control" readonly="" value="{{ $franchisee->id_code }}">
                </div>
                <div class="form-group">
                    <label>Area Code</label>
                    <input type="text" class="form-control" readonly="" value="{{ $franchisee->area_code }}">
                </div>
                <div class="form-group">
                    <label>Full Name</label>
                    <input type="text" class="form-control" readonly="" value="{{ $franchisee->owner }}">
                </div>
                <div class="form-group">
                    <label>Company Name</label>
                    <input type="text" class="form-control" readonly="" value="{{ $franchisee->company_name }}">
                </div>
                <div class="form-group">
                    <label>Date Started</label>
                    <input type="text" class="form-control" readonly="" value="{{ date('F d Y', strtotime($franchisee->date_started)) }}">
                </div>
            </div>
            <div class="box-footer">
                <a href="{{ url('admin/franchisees') }}" class="btn btn-sm btn-flat btn-github">Back</a>
                <a href="{{ url('admin/franchisees/'.$franchisee->id) }}/edit" class="btn btn-sm btn-flat btn-primary pull-right">Edit</a>
            </div>
        </div>
    </div>
    <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">
        <div class="box box-success">
            <div class="box-header with-border">
                <h3 class="box-title">Admin Users</h3>
            </div>
            <div class="box-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="box-tools">
                            <div class="input-group">
                                <input type="text" name="table_search" class="form-control pull-right" id="mySearch" placeholder="Search">
                                <div class="input-group-btn">
                                    <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <table class="table table-bordered table-striped table-hover text-center" width="100%">
                            <thead>
                                <tr>
                                    <th>Account Name</th>
                                    <th>Username</th>
                                    <th>Status</th>
                                    <th>
                                        <a href="{{url('admin/franchisees/'.$franchisee->id)}}/create"><i class="fa fa-plus"></i> User</a>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($franchisee->users as $user)
                                <tr>
                                    <td>{{$user->name}}</td>
                                    <td>{{$user->username}}</td>
                                    <td>{{$user->status ? 'active' : 'non-active'}}</td>
                                    <td>
                                        <a href="{{url('admin/franchisees/'.$user->id)}}/editUser" class="btn btn-sm btn-flat btn-primary">Edit</a>
                                        <button class="btn btn-sm btn-flat btn-success btn-change-pass" data-id="{{ $user->id }}">Change Password</button>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Modal -->
<form class="modal fade" id="changePasswordModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" method="post" action="{{ url('admin/franchisees/userChangePassword') }}">@csrf
    <input type="hidden" id="userId" name="userId">
    <div class="modal-dialog modal-dialog-centered modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">User Change Password</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <label>New Password: <font color="red">*</font></label>
                <input type="password" class="form-control" value="" id="new_password" name="password" required="" placeholder="New Password">
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary btn-flat btn-sm">Update</button>
            </div>
        </div>
    </div>
</form>
@stop

@section('extend-js')
<script type="text/javascript">

$(document).ready(function() {
    $('table').DataTable({
        ordering:false,
        lengthChange: false,
    });
});

$('body').delegate('.btn-change-pass', 'click', function(event) {
    let id = $(this).data('id');
    $('#userId').val(id);
    $('#changePasswordModal').modal('show');
});

$('body').delegate('#changePasswordModal', 'submit', function() {
    event.preventDefault();
    alertify.confirm("Are you sure that you want to submit?",
    function(){
        $('.preloader').show();
        $('#changePasswordModal').submit();
    },
    function(){
        alertify.error('Cancel');
    }).setHeader('<em> Warning! </em> ');
});

</script>
@stop

