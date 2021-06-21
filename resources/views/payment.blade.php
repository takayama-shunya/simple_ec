@extends('layouts.ecapp')


@section('content')
<div class="container-fluid">
   <div class="">
       <div class="mx-auto" style="max-width:1200px">
           <h1 style="color:#555555; text-align:center; font-size:1.2em; padding:24px 0px; font-weight:bold;">カート商品一覧</h1>
           <div class="py-12">
              合計金額　{{$total_price}}円
              <form action="/mycart/settlement" method="POST">
                {{ csrf_field() }}
                  <script
                    src="https://checkout.stripe.com/checkout.js" class="stripe-button"
                    data-key="{{ config('payment.stripe_public_key') }}"
                    data-amount={{ $total_price }}
                    data-name="Stripe Demo"
                    data-label="決済をする"
                    data-description="これはStripeのデモです。"
                    data-image="https://stripe.com/img/documentation/checkout/marketplace.png"
                    data-locale="auto"
                    data-currency="JPY">  
                  </script>
              </form>
           </div>
           <div class="pb-12">
              @foreach($my_carts as $cart)
                <div class=""> 
                  <p class="pb-2">{{$cart->stock->name}}</p>
                  <?php
                    $price = $cart->stock_number * $cart->stock->fee
                  ?>
                  <p class="pb-2">{{$cart->stock->fee}}円 ✖️ {{$cart->stock_number}}個 ＝ {{$price}}円</p>
                </div>
              @endforeach
           </div>
           <div class="">
                @foreach($my_carts as $cart)
                  <div class="pb-12"> 
                      <p class="pb-2">{{$cart->stock->name}} : {{$cart->stock->fee}}円</p>
                      @if ($cart->stock->imgpath == null )
                        <p class="pb-2"><img img src="{{ asset('storage/images/noimage.png') }}" alt="" class="incart img" ></p>
                      @else
                        <p class="pb-2"><img img src="{{ asset('storage/images/' . $cart->stock->imgpath) }}" alt="" class="incart img" ></p>
                      @endif
                      <p class="pb-2">{{$cart->stock->detail}}</p>
                      <p class="pb-2">{{$cart->stock_number}}個</p>
                  </div>
                @endforeach
               </div>
           </div>
       </div>
   </div>
</div>
@endsection