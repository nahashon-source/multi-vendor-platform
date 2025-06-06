<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\product;


class ShopController extends Controller
{
    //
    public function index() 
    {
        $products = Product::with('vendor')->where('status', 'active')->get();
        return view('shop.index', compact('products'));
    }
    
}
