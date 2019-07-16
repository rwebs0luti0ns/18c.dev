<?php

namespace App\Http\Controllers\Admin\Items;

use App\Http\Controllers\Controller;
use App\Models\Brands\Brand;
use App\Models\Categories\Category;
use App\Models\Items\Item;
use App\Models\Products\Product;
use App\Models\UnitCapacities\UnitCapacity;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        if(request()->ajax()) {
            $items = Item::select(['id','item_code','srp','brand_id','product_id','category_id','unit_capacity_id','active'])->latest()->get();
            return datatables($items)
            ->editColumn('brand_id', function ($items) {
                return $items->brand->name;
            })
            ->editColumn('product_id', function ($items) {
                return $items->product->name;
            })
            ->editColumn('category_id', function ($items) {
                return $items->category->name;
            })
            ->editColumn('unit_capacity_id', function ($items) {
                return $items->unit_capacity->name;
            })
            ->editColumn('active', function ($items) {
                if ($items->active) {
                    return '<label class="badge bg-green"><i class="fa fa-thumbs-up"></i></label>';
                } else {
                    return '<label class="badge bg-red"><i class="fa fa-thumbs-down"></i></label>';
                }
            })
            ->addColumn('action', function ($items) {
                return '<a class="btn btn-sm btn-flat btn-primary" href='.url('admin/items/'.$items->id).'/edit>Edit</a>';
            })
            ->rawColumns(['active'=>'active','action'=>'action'])
            ->toJson();
        }

        $active = 'item-page';
        return view('modules.admin.items.index',compact('active'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $active = 'item-page';
        $brands = Brand::all();
        $products = Product::all();
        $categories = Category::all();
        $unit_capacities = UnitCapacity::all();
        return view('modules.admin.items.create',compact('active','brands','products','categories','unit_capacities'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate([
            'item_code'         => 'required|unique:items,item_code',
            'srp'               => 'required|numeric',
            'brand_id'          => 'required',
            'product_id'        => 'required',
            'category_id'       => 'required',
            'unit_capacity_id'  => 'required',
        ]);

        Item::create($request->all());
        return redirect('admin/items')->with('message','Successfully added new item!');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Item $item)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Item $item)
    {

        $active = 'item-page';
        $brands = Brand::all();
        $products = Product::all();
        $categories = Category::all();
        $unit_capacities = UnitCapacity::all();
        return view('modules.admin.items.edit',compact('active','brands','products','categories','unit_capacities','item'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Item $item)
    {

        $request->validate([
            'item_code'         => 'required|unique:items,item_code,'.$item->id,
            'srp'               => 'required|numeric',
            'brand_id'          => 'required',
            'product_id'        => 'required',
            'category_id'       => 'required',
            'unit_capacity_id'  => 'required',
        ]);

        $item->update($request->all());
        return back()->with('message','Successfully updated item details!');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
