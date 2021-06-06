<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Stock;

class ShopController extends Controller
{
    public function index()
    {
        $stocks = Stock::simplePaginate(6);
        return view('shop',compact('stocks'));
    }
}
