<?php

namespace App\Http\Controllers\Admin\Categories;

use App\Http\Controllers\Controller;
use App\Models\Categories\Category;
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
        //
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
