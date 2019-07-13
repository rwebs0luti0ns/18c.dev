@extends('layouts.template')

@section('top-content')
<section class="content-header">
    <h1>
        QUOTATION
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{ url('franchisee/dashboard') }}"><i class="fa fa-home"></i> Home</a></li>
        <li class="active"><a href="{{ url('franchisee/quotations') }}"><i class="fa fa-users"></i> Quotation</a></li>
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
                <a href="{{ url('franchisee/quotations/create') }}" class="btn btn-flat btn-success bg-green btn-block"><i class="fa fa-plus"></i>QUOTATION</a>
            </div>
        </div>
    </div>
    <div class="box-body">
        <table width="100%" class="table table-striped table-bordered table-hover text-center">
            <thead>
                <tr>
                    <th>Ref #</th>
                    <th>Customer</th>
                    <th>Brand</th>
                    <th>Product</th>
                    <th>Category</th>
                    <th>Unit Capacity</th>
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
                    <th></th>
                    <th width="5%"></th>
                    <th width="5%"></th>
                </tr>
            </tfoot>
        </table>
    </div>
</div>
@stop
