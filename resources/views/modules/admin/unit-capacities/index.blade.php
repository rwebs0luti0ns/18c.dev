@extends('layouts.template')

@section('top-content')
<section class="content-header">
    <h1>
        LIST OF UNIT CAPACITIES
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{ url('admin/dashboard') }}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="{{ url('admin/unit-capacities') }}"><i class="fa fa-table"></i> Unit Capacities</a></li>
        <li class="active">List page</li>
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
                <a href="{{ url('admin/unit-capacities/create') }}" class="btn btn-flat btn-success bg-green btn-block"><i class="fa fa-plus"></i> UNIT CAPACITY</a>
            </div>
        </div>
    </div>
    <div class="box-body">
        <table width="100%" class="table table-striped table-bordered table-hover text-center">
            <thead>
                <tr>
                    <th width="50%">Unit Capacity</th>
                    <th width="50%">Action</th>
                </tr>
            </thead>
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
        ajax: '{{ url('admin/unit-capacities') }}',
        columns: [
            { data: 'name' },
            { data: 'action' },
        ]
    });

    $('#mySearch').on( 'keyup', function () {
        table.search( this.value ).draw();
    } );

});
</script>
@stop

