@extends('layouts.ecapp')


@section('content')
<div class="container-fluid">
   <div class="">
       <div class="mx-auto" style="max-width:1200px">
           <h1 style="color:#555555; text-align:center; font-size:1.2em; padding:24px 0px; font-weight:bold;">カート商品一覧</h1>
           <div class="py-12">
              合計金額　{{$total_price}}円
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
                      <p class="pb-2"><img src="/image/{{$cart->stock->imgpath}}" alt="" class="incart" ></p>
                      <p class="pb-2"><img src="/images/noimage.png" alt="" class="incart" ></p>
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