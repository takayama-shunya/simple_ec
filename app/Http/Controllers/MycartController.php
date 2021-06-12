<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use Illuminate\Support\Facades\Auth;


class  MycartController extends Controller
{
    public function index()
    {
        $user_id = Auth::id(); 
        $my_carts = Cart::where('user_id',$user_id)->get();
        return view('mycart', compact('my_carts'));
    }

    public function store(Request $request)
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

    public function destroy(Request $request)
    {
        $stock_id = $request->stock_id;
        $user_id = Auth::id(); 
        $my_cart = Cart::where('user_id', $user_id)->where('stock_id', $stock_id);

        // $my_cart->delete();
        // return redirect('/mycart');
        if($my_cart->delete()){
            session()->flash('flash_message', 'カートから削除しました');
            return redirect('/mycart');
        }
        else{
            session()->flash('flash_message', '失敗しました');
            return redirect('/mycart');
        }
    }

}
