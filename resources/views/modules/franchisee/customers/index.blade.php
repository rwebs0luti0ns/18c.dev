@extends('layouts.template')

@section('top-content')
<section class="content-header">
    <h1>
        CUSTOMER
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{ url('franchisee/dashboard') }}"><i class="fa fa-home"></i> Home</a></li>
        <li class="active"><a href="{{ url('franchisee/customers') }}"><i class="fa fa-users"></i> Customers</a></li>
    </ol>
</section>
@stop
@section('content')
<div class="box box-success">
    <div class="box-header with-border">
        <div class="row">
            <div class="col-md-10">
                <div class="box-tools">
                    <div class="input-group">
                        <input type="text" name="table_search" class="form-control pull-right" id="mySearch" placeholder="Search">
                        <div class="input-group-btn">
                            <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-2">
                <a href="{{ url('franchisee/customers/create') }}" class="btn btn-flat btn-success bg-green btn-block"><i class="fa fa-plus"></i> CUSTOMER</a>
            </div>
        </div>
    </div>
    <div class="box-body">
        <table width="100%" class="table table-striped table-bordered table-hover text-center">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Contact</th>
                    <th>Email</th>
                    <th>Address</th>
                    <th>Remark</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
    </div>
</div>
@stop
@section('extend-js')
<script type="text/javascript">
$(document).ready(function() {
    var table = $('table').DataTable({
        ordering: false,
        processing: true,
        serverSide: true,
        lengthChange: false,
        ajax: '{{ url('franchisee/customers') }}',
        columns: [
            { data: 'name' },
            { data: 'contact' },
            { data: 'email' },
            { data: 'address' },
            { data: 'remark'},
            { data: 'action'},
        ]
    });
    $('#mySearch').on( 'keyup', function () {
        table.search( this.value ).draw();
    } );

});
</script>
@stop