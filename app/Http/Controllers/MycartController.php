<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use Illuminate\Support\Facades\Auth;
use Stripe\Stripe;
use Stripe\Charge;
use Stripe\Customer;
use Exception;


class  MycartController extends Controller
{
    public function mycarts()
    {
        $user_id = Auth::id(); 
        return Cart::where('user_id',$user_id)->get();
    }

    public function index()
    {
        $my_carts = $this->mycarts();
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

    public function payment()
    {
        $my_carts = $this->mycarts();
        $prices = $my_carts->map(function ($cart) {
          return $cart->stock_number * $cart->stock->fee;
        });
        $total_price = $prices->sum();
        return view('payment', compact('my_carts', 'total_price'));
    }

    public function settlement(Request $request)
    {
        try
        {
            Stripe::setApiKey(config('payment.stripe_secret_key'));

            $customer = Customer::create(array(
                'email' => $request->stripeEmail,
                'source' => $request->stripeToken
            ));

            $charge = Charge::create(array(
                'customer' => $customer->id,
                'amount' => 1000,
                'currency' => 'jpy'
            ));
            session()->flash('flash_message', '支払い完了しました');
            return redirect('/mycart');
        }
        catch(Exception $e)
        {
            return $e->getMessage();
        }    
    }

}
