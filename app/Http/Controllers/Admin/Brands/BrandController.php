<?php

namespace App\Http\Controllers\Admin\Brands;

use App\Http\Controllers\Controller;
use App\Models\Brands\Brand;
use App\Models\Items\Item;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        if(request()->ajax()) {
            $brand = Brand::select(['id','name'])->get();
            return datatables($brand)
            ->addColumn('action', function ($brand) {
                $btn  = '<div class="btn-group">';
                $btn .= '<a class="btn btn-sm btn-flat btn-primary" href="'.url('admin/brands/'.$brand->id).'/edit">Edit</a>';
                $btn .= '<a class="btn btn-sm btn-flat btn-success" href="'.url('admin/brands/'.$brand->id).'">Show</a>';
                $btn .= '</div>';
                return $btn;
            })
            ->toJson();
        }

        $active = 'brand-page';
        return view('modules.admin.brands.index',compact('active'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $active = 'brand-page';
        return view('modules.admin.brands.create',compact('active'));
        
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
            'name' => 'required|unique:brands,name'
        ]);

        Brand::create($request->all());
        return redirect('admin/brands')->with('message','Successfully added new brand!');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Brand $brand)
    {

        if(request()->ajax()) {
            $items = Item::select(['id','item_code','srp','brand_id','product_id','category_id','unit_capacity_id','active'])->where('brand_id',$brand->id)->latest()->get();
            return datatables($items)
            ->editColumn('srp', function ($items) {
                return number_format($items->srp, 2);
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
        
        $active = 'brand-page';
        return view('modules.admin.brands.show',compact('active','brand'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Brand $brand)
    {

        $active = 'brand-page';
        return view('modules.admin.brands.edit',compact('active','brand'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Brand $brand)
    {

        $request->validate([
            'name' => 'required|unique:brands,name,'.$brand->id
        ]);

        $brand->update($request->all());
        return redirect('admin/brands')->with('message','Successfully updated brand name!');

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
