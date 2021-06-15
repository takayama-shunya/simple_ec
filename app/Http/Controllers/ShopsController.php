<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Stock;


class ShopsController extends Controller
{
    public function index()
    {
        $stocks = Stock::orderBy('created_at', 'asc')->paginate(10);
        return view('shop/index',compact('stocks'));
    }

    public function create()
    {
        return view('shop/create');
    }
}
