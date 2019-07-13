<?php

namespace App\Http\Controllers\Franchisee\Quotations;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Brands\Brand;
use App\Models\Customers\Customer;
use App\Models\Franchisees\Franchisee;
use App\Models\Items\Item;
use Auth;

class QuotationController extends Controller
{
    
    public function index()
    {

    	$active	= 'quotation-page';
    	return view('modules.franchisee.quotations.index', compact('active'));
    }

    public function create()
    {
    	
    	$customers = Franchisee::findOrFail(Auth::guard('franchisee')->user()->franchisee_id)->customers;
    	$franchisee = Franchisee::findOrFail(Auth::guard('franchisee')->user()->franchisee_id);

    	$items = Item::all();
    	$active	= 'quotation-page';
    	return view('modules.franchisee.quotations.create', compact('active','customers','franchisee','items'));

    }
}
