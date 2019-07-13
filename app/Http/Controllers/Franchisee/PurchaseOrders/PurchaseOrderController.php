<?php

namespace App\Http\Controllers\Franchisee\PurchaseOrders;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PurchaseOrderController extends Controller
{
    
    public function index()
    {

    	$active = 'purchase-page';
    	return view('modules.franchisee.purchases.index', compact('active'));
    }
}
