<?php

namespace App\Http\Controllers\Franchisee\Customers;

use App\Http\Controllers\Controller;
use App\Models\Customers\Customer;
use Illuminate\Http\Request;
use Auth;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $fId = Auth::guard('franchisee')->user()->franchisee_id;

        if(request()->ajax()) {
            $customers = Customer::select(['id','name','address','contact_no','email','remarks'])->orderBy('name','ASC')->where('franchisee_id',$fId)->get();
            return datatables($customers)
            ->addColumn('action', function ($customers) {
                return '<a class="btn btn-flat btn-sm btn-success" href="'.url('franchisee/customers/'.$customers->id).'">View</a>';
            })
            ->toJson();
        }
        $active = 'customer-page';
        return view('modules.franchisee.customers.index',compact('active'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $active = 'customer-page';
        return view('modules.franchisee.customers.create',compact('active'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $fId = Auth::guard('franchisee')->user()->franchisee_id;

        $request->validate([
            'name'          => 'required',
            'contact_no'    => 'required',
            'email'         => 'required|email',
            'address'       => 'required'
        ]);

        $inputs = $request->all();
        $inputs['franchisee_id'] = $fId;
        $customer = Customer::create($inputs);
        return redirect('franchisee/customers/'.$customer->id)->with('message','Successfully added new customer!');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Customer $customer)
    {

        $fId = Auth::guard('franchisee')->user()->franchisee_id;

        if ($fId != $customer->franchisee_id) {
            return abort(401);
        }

        $active = 'customer-page';
        return view('modules.franchisee.customers.show',compact('active','customer'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Customer $customer)
    {

        $fId = Auth::guard('franchisee')->user()->franchisee_id;

        if ($fId != $customer->franchisee_id) {
            return abort(401);
        }

        $active = 'customer-page';
        return view('modules.franchisee.customers.edit',compact('active','customer'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Customer $customer)
    {

        $request->validate([
            'name'          => 'required',
            'contact_no'    => 'required',
            'email'         => 'required|email',
            'address'       => 'required'
        ]);

        $customer->update($request->all());
        return redirect('franchisee/customers/'.$customer->id)->with('message','Successfully updated customer details!');

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
