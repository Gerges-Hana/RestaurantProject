<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Product;
use Illuminate\Http\Request;

class BillController extends Controller
{
    public function create()
    {
        $customers = Customer::all();
        $products = Product::all();
        $msg = 'msg';
        return view('bill', [
            'customers' => $customers,
            'products' => $products,
            'msg' => $msg
        ]);
    }

    public function insert(Request $req)
    {
        dd($req);
    }
}
