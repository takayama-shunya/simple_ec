<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Stock;
use App\Models\Cart;
use Illuminate\Support\Facades\Auth;


class ShopController extends Controller
{
    public function index()
    {
        $stocks = Stock::orderBy('created_at', 'asc')->paginate(10);
        return view('shop',compact('stocks'));
    }

    public function mycart()
    {
        $user_id = Auth::id(); 
        $my_carts = Cart::where('user_id',$user_id)->get();
        return view('mycart', compact('my_carts'));
    }

    public function addmycart(Request $request)
    {
        $user_id = Auth::id(); 
        $stock_id = $request->stock_id;
        $stock_number = $request->number;
 
        $cart_add_info = Cart::firstOrCreate(['stock_id' => $stock_id,'user_id' => $user_id,], ['stock_number' => $stock_number]);

        if($cart_add_info->wasRecentlyCreated){
            session()->flash('flash_message', 'カートに入れました');
            return redirect('/');
        }
        else{
            session()->flash('flash_message', '失敗しました');
            return redirect('/');
        }
 
        // return view('mycart',compact('my_carts' , 'message', 'stock_number'));
    }
}
