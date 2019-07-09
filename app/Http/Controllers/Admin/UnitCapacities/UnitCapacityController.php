<?php

namespace App\Http\Controllers\Admin\UnitCapacities;

use App\Http\Controllers\Controller;
use App\Models\Items\Item;
use App\Models\UnitCapacities\UnitCapacity;
use Illuminate\Http\Request;

class UnitCapacityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        if(request()->ajax()) {
            $unit_capacities = UnitCapacity::select(['id','name'])->get();
            return datatables($unit_capacities)
            ->addColumn('action', function ($unit_capacities) {
                $btn  = '<div class="btn-group">';
                $btn .= '<a class="btn btn-sm btn-flat btn-primary" href="'.url('admin/unit-capacities/'.$unit_capacities->id).'/edit">Edit</a>';
                $btn .= '<a class="btn btn-sm btn-flat btn-success" href="'.url('admin/unit-capacities/'.$unit_capacities->id).'">Show</a>';
                $btn .= '</div>';
                return $btn;
            })
            ->toJson();
        }

        $active = 'unit-capacity-page';
        return view('modules.admin.unit-capacities.index',compact('active'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $active = 'unit-capacity-page';
        return view('modules.admin.unit-capacities.create',compact('active'));

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
            'name' => 'required|unique:unit_capacities,name'
        ]);

        UnitCapacity::create($request->all());
        return redirect('admin/unit-capacities')->with('message','Successfully added new unit capacity!');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(UnitCapacity $unit_capacity)
    {

        if(request()->ajax()) {
            $items = Item::select(['id','item_code','srp','brand_id','product_id','category_id','unit_capacity_id','active'])->where('unit_capacity_id',$unit_capacity->id)->latest()->get();
            return datatables($items)
            ->editColumn('srp', function ($items) {
                return number_format($items->srp, 2);
            })
            ->editColumn('brand_id', function ($items) {
                return $items->brand->name;
            })
            ->editColumn('product_id', function ($items) {
                return $items->product->name;
            })
            ->editColumn('category_id', function ($items) {
                return $items->category->name;
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

        $active = 'unit-capacity-page';
        return view('modules.admin.unit-capacities.show',compact('active','unit_capacity'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(UnitCapacity $unit_capacity)
    {

        $active = 'unit-capacity-page';
        return view('modules.admin.unit-capacities.edit',compact('active','unit_capacity'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, UnitCapacity $unit_capacity)
    {

        $request->validate([
            'name' => 'required|unique:unit_capacities,name,'.$unit_capacity->id
        ]);

        $unit_capacity->update($request->all());
        return redirect('admin/unit-capacities')->with('message','Successfully updated unit capacity!');

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
