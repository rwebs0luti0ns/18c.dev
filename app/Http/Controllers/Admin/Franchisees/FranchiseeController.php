<?php

namespace App\Http\Controllers\Admin\Franchisees;

use App\Http\Controllers\Controller;
use App\Models\Auth\User;
use App\Models\Franchisees\Franchisee;
use Hash;
use Illuminate\Http\Request;

class FranchiseeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        if(request()->ajax()) {
            $franchisees = Franchisee::select(['id','owner','id_code','area_code','company_name','date_started'])->get();
            return datatables($franchisees)
            ->addColumn('action', function ($franchisees) {
                return '<a class="btn btn-flat btn-sm btn-success" href="'.url('admin/franchisees/'.$franchisees->id).'">View</a>';
            })
            ->editColumn('date_started', function ($franchisees) {
                return date('m/d/Y', strtotime($franchisees->date_started));
            })
            ->toJson();
        }

        $active = 'franchisee-page';
        return view('modules.admin.franchisees.index',compact('active'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $active = 'franchisee-page';
        return view('modules.admin.franchisees.create',compact('active'));

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
            'id_code'       => 'required|unique:franchisees,id_code',
            'area_code'     => 'required',
            'owner'         => 'required',
            'company_name'  => 'required',
            'date_started'  => 'required|date',
        ]);

        $franchisee = Franchisee::create($request->all());
        return redirect('admin/franchisees/'.$franchisee->id)->with('message','Successfully added new franchisee!');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Franchisee $franchisee)
    {

        $active = 'franchisee-page';
        return view('modules.admin.franchisees.show',compact('active','franchisee'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Franchisee $franchisee)
    {

        $active = 'franchisee-page';
        return view('modules.admin.franchisees.edit',compact('active','franchisee'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Franchisee $franchisee)
    {

        $request->validate([
            'id_code'       => 'required|unique:franchisees,id_code,'.$franchisee->id,
            'area_code'     => 'required',
            'owner'         => 'required',
            'company_name'  => 'required',
            'date_started'  => 'required|date',
        ]);

        $franchisee->update($request->all());
        return redirect('admin/franchisees/'.$franchisee->id)->with('message','Successfully updated franchisee details!');

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
