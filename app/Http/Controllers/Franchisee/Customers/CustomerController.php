<?php

namespace App\Http\Controllers\Franchisee\Customers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use App\Models\Customers\Customer;
use App\Models\Franchisees\Franchisee;
class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $user = Auth::guard('franchisee')->user();
        if(request()->ajax()){

            $customers = Customer::select(['id','name','contact','email','address','remark'])->where('franchisee_id',$user->franchisee_id)->get();
            return datatables($customers)
            ->editColumn('remark', function($customers){
                return $customers->remark ? 'Active' : 'Not Active';
            })
            ->addColumn('action', function($customers){
                return '<a class="btn btn-flat btn-sm btn-primary" href="'.url('franchisee/customers/'.$customers->id.'/edit').'">Edit</a>';
            })
            ->toJson();
        }
        $active =   'customer-page';
        return view('modules.franchisee.customers.index', compact('active'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $active =   'customer-page';
        return view('modules.franchisee.customers.create', compact('active'));
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
            'name'      =>  'required',
            'email'  =>  'required|unique:customers,email',
            'contact'  =>  'required'
        ]);
        $inputs = $request->all();
        $inputs['franchisee_id'] = Auth::guard('franchisee')->user()->franchisee_id;
        $inputs['remark']   =   '1';
        Customer::create($inputs);
        return redirect('franchisee/customers');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {


    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $customer = Customer::findOrFail($id);
        $active   =   'customer-page';
        return view('modules.franchisee.customers.edit', compact('active','customer'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        
        $request->validate([
            'name'      =>  'required',
            'email'  =>  'required',
            'contact'  =>  'required'
        ]);

        $customer = Customer::findOrFail($id);
        $customer->update($request->all());
        return redirect('franchisee/customers')->with('message','Succesfully updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Customer::delete($id);
    }
}
