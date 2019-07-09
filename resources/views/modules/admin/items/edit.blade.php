@extends('layouts.template')

@section('top-content')
<section class="content-header">
    <h1>
        EDIT ITEM
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{ url('admin/dashboard') }}"><i class="fa fa-home"></i> Home</a></li>
        <li><a href="{{ url('admin/items') }}"><i class="fa fa-table"></i> Items</a></li>
        <li class="active">Edit page</li>
    </ol>
</section>
@stop

@section('content')

<form class="box box-solid" id="form-item" method="post" action="{{ url('admin/items/'.$item->id) }}">@csrf @method('put')
    <div class="box-body row">
        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 form-group">
            <label>Item Code: <font color="red">*</font></label>
            <input type="text" class="form-control" value="{{ $item->item_code }}" name="item_code" required="" placeholder="Enter Item Code">
        </div>
        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 form-group">
            <label>SRP: <font color="red">*</font></label>
            <input type="text" class="form-control" value="{{ $item->srp }}" name="srp" required="" placeholder="Enter SRP">
        </div>
        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 form-group">
            <label>Brand: <font color="red">*</font></label>
            <select class="form-control" name="brand_id" required="">
                @foreach($brands as $brand)
                <option @if($item->brand_id == $brand->id) selected="" @endif value="{{ $brand->id }}">{{ $brand->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 form-group">
            <label>Product: <font color="red">*</font></label>
            <select class="form-control" name="product_id" required="">
                @foreach($products as $product)
                <option @if($item->product_id == $product->id) selected="" @endif value="{{ $product->id }}">{{ $product->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 form-group">
            <label>Category: <font color="red">*</font></label>
            <select class="form-control" name="category_id" required="">
                @foreach($categories as $category)
                <option @if($item->category_id == $category->id) selected="" @endif value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 form-group">
            <label>Unit Capacity: <font color="red">*</font></label>
            <select class="form-control" name="unit_capacity_id" required="">
                @foreach($unit_capacities as $unit_capacity)
                <option @if($item->unit_capacity_id == $unit_capacity->id) selected="" @endif value="{{ $unit_capacity->id }}">{{ $unit_capacity->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 form-group">
            <label>Active?: <font color="red">*</font></label>
            <select class="form-control" name="active" required="">
                <option @if($item->active == 1) selected="" @endif value="1">Yes</option>
                <option @if($item->active == 0) selected="" @endif value="0">No</option>
            </select>
        </div>
    </div>
    <div class="box-footer">
        <a href="{{ url('admin/items') }}" class="btn btn-sm btn-flat btn-github">Back</a>
        <button type="submit" class="btn btn-sm btn-flat btn-success pull-right">Submit</button>
    </div>
</form>

@stop

@section('extend-js')
<script type="text/javascript">
$(document).ready(function() {
    $('body').delegate('#form-item', 'submit', function() {
        event.preventDefault();
        alertify.confirm("Are you sure that you want to submit?",
        function(){
            $('.preloader').show();
            $('#form-item').submit();
        },
        function(){
            alertify.error('Cancel');
        }).setHeader('<em> Warning! </em> ');    
    });
});
</script>
@stop
