@extends('layouts.template')

@section('top-content')
<section class="content-header">
    <h1>
        UNIT CAPACITY: {{ $unit_capacity->name }}
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
                <a href="{{ url('admin/unit-capacities/create') }}" class="btn btn-flat btn-success bg-green btn-block"><i class="fa fa-plus"></i> ITEM</a>
            </div>
        </div>
    </div>
    <div class="box-body">
        <table width="100%" class="table table-striped table-bordered table-hover text-center">
            <thead>
                <tr>
                    <th>Item Code</th>
                    <th>SRP</th>
                    <th>Brand</th>
                    <th>Product</th>
                    <th>Category</th>
                    <th width="5%">Status</th>
                    <th width="5%">Action</th>
                </tr>
            </thead>

            <tfoot>
                <tr>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th width="5%"></th>
                    <th width="5%"></th>
                </tr>
            </tfoot>
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
        ajax: '{{ url('admin/unit-capacities') }}/{{ $unit_capacity->id }}',
        columns: [
            { data: 'item_code' },
            { data: 'srp' },
            { data: 'brand_id' },
            { data: 'product_id' },
            { data: 'category_id' },
            { data: 'active', searchable:false },
            { data: 'action', searchable:false },
        ],
        initComplete: function () {
            this.api().columns().every( function () {
                var column = this;
                var select = $('<select><option value="">Filter</option></select>')
                    .appendTo( $(column.footer()).empty() ).select2()
                    .on( 'change', function () {
                        var val = $.fn.dataTable.util.escapeRegex(
                            $(this).val()
                        );
 
                        column
                            .search( val ? '^'+val+'$' : '', true, false )
                            .draw();
                    } );
                column.data().unique().sort().each( function ( d, j ) {
                    select.append( '<option value="'+d+'">'+d+'</option>' )
                } );
            } );
        }
    });

    $('#mySearch').on( 'keyup', function () {
        table.search( this.value ).draw();
    } );

});
</script>
@stop

