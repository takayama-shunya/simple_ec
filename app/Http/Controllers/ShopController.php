<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Stock;
use App\Models\Cart;

class ShopController extends Controller
{
    public function index()
    {
        $stocks = Stock::orderBy('created_at', 'asc')->paginate(10);
        return view('shop',compact('stocks'));
    }

    public function mycart()
    {
        $carts = Cart::all();
        return view('mycart', compact('carts'));
    }
}
