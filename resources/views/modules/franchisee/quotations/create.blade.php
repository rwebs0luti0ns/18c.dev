@extends('layouts.template')

@section('top-content')
<section class="content-header">
    <h1>
        QUOTATION
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{ url('franchisee/dashboard') }}"><i class="fa fa-home"></i> Home</a></li>
        <li class="active"><a href="{{ url('franchisee/quotations') }}"><i class="fa fa-users"></i> Quotation</a></li>
        <li class="active">Create page</li>
    </ol>
</section>
@stop
@section('content')
    
<form class="box box-solid" id="form-item" method="post" action="{{ url('franchisee/quotation') }}">@csrf
    <div class="box-body row">

        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 form-group">
            <label>Customer: <font color="red">*</font></label>
            <select class="form-control" name="customer_id" required="">
                <option value="" selected="">Select Customer</option>
                @foreach($customers as $customer)
                <option @if(old('customer_id') == $customer->id) selected="" @endif value="{{ $customer->id }}">{{ $customer->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 form-group">
            <label>Ref #:</label>
            <input type="text" class="form-control" value="{{$franchisee->id_code}}-Q-10001" name="srp" required="" placeholder="Enter SRP" disabled="disabled">
        </div>

        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 form-group">
            <label>Item: <font color="red">*</font></label>
            <select class="form-control" name="item_id" required="">
                <option value="" selected="">Select Item</option>
                @foreach($items as $item)
                <option @if(old('item_id') == $item->id) selected="" @endif value="{{ $item->id }}">{{ $item->item_code }}</option>
                @endforeach
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

    </script>
@stop