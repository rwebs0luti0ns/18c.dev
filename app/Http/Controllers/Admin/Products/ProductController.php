<?php

namespace App\Http\Controllers\Admin\Products;

use App\Http\Controllers\Controller;
use App\Models\Items\Item;
use App\Models\Products\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        if(request()->ajax()) {
            $products = Product::select(['id','name'])->get();
            return datatables($products)
            ->addColumn('action', function ($products) {
                $btn  = '<div class="btn-group">';
                $btn .= '<a class="btn btn-sm btn-flat btn-primary" href="'.url('admin/products/'.$products->id).'/edit">Edit</a>';
                $btn .= '<a class="btn btn-sm btn-flat btn-success" href="'.url('admin/products/'.$products->id).'">Show</a>';
                $btn .= '</div>';
                return $btn;
            })
            ->toJson();
        }

        $active = 'product-page';
        return view('modules.admin.products.index',compact('active'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $active = 'product-page';
        return view('modules.admin.products.create',compact('active'));

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
            'name' => 'required|unique:products,name'
        ]);

        Product::create($request->all());
        return redirect('admin/products')->with('message','Successfully added new product!');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {

        if(request()->ajax()) {
            $items = Item::select(['id','item_code','srp','brand_id','product_id','category_id','unit_capacity_id','active'])->where('product_id',$product->id)->latest()->get();
            return datatables($items)
            ->editColumn('srp', function ($items) {
                return number_format($items->srp, 2);
            })
            ->editColumn('brand_id', function ($items) {
                return $items->brand->name;
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
        $active = 'product-page';
        return view('modules.admin.products.show',compact('active','product'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {

        $active = 'product-page';
        return view('modules.admin.products.edit',compact('active','product'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {

        $request->validate([
            'name' => 'required|unique:products,name,'.$product->id
        ]);

        $product->update($request->all());
        return redirect('admin/products')->with('message','Successfully updated product name!');

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
