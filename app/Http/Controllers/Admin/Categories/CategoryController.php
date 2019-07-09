<?php

namespace App\Http\Controllers\Admin\Categories;

use App\Http\Controllers\Controller;
use App\Models\Categories\Category;
use App\Models\Items\Item;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        if(request()->ajax()) {
            $categories = Category::select(['id','name'])->get();
            return datatables($categories)
            ->addColumn('action', function ($categories) {
                $btn  = '<div class="btn-group">';
                $btn .= '<a class="btn btn-sm btn-flat btn-primary" href="'.url('admin/categories/'.$categories->id).'/edit">Edit</a>';
                $btn .= '<a class="btn btn-sm btn-flat btn-success" href="'.url('admin/categories/'.$categories->id).'">Show</a>';
                $btn .= '</div>';
                return $btn;
            })
            ->toJson();
        }

        $active = 'category-page';
        return view('modules.admin.categories.index',compact('active'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $active = 'category-page';
        return view('modules.admin.categories.create',compact('active'));

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
            'name' => 'required|unique:categories,name'
        ]);

        Category::create($request->all());
        return redirect('admin/categories')->with('message','Successfully added new category!');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {

        if(request()->ajax()) {
            $items = Item::select(['id','item_code','srp','brand_id','product_id','category_id','unit_capacity_id','active'])->where('category_id',$category->id)->latest()->get();
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

        $active = 'category-page';
        return view('modules.admin.categories.show',compact('active','category'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {

        $active = 'category-page';
        return view('modules.admin.categories.edit',compact('active','category'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {

        $request->validate([
            'name' => 'required|unique:categories,name,'.$category->id
        ]);

        $category->update($request->all());
        return redirect('admin/categories')->with('message','Successfully updated category name!');

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
