@extends('layouts.ecapp')


@section('content')
<div class="container-fluid">
   <div class="">
       <div class="mx-auto" style="max-width:1200px">
           <h1 style="color:#555555; text-align:center; font-size:1.2em; padding:24px 0px; font-weight:bold;">カート商品一覧</h1>
           <div class="">
               <div class="d-flex flex-row flex-wrap">
                   カート商品一覧
               </div>
               <div>
                @foreach($my_carts as $cart)
                <p class="pb-2">{{$cart->stock->name}} : {{$cart->stock->fee}}円</p>
                      <p class="pb-2"><img src="/image/{{$cart->stock->imgpath}}" alt="" class="incart" ></p>
                      <p class="pb-2">{{$cart->stock->detail}}</p>
                      <p class="pb-2">{{$cart->stock_number}}</p>
                      <form action="mycart" method="post">
                        @csrf
                        <input type="hidden" name="stock_id" value="{{ $cart->stock->id }}">
                        <!-- <input type="number" name="number" value="1" min="1" max="5"> -->
                        <!-- <input type="submit" value="カートに入れる"> -->
                        <button class="btn btn--blue btn--radius btn--cubic mx-8">
                          カートから消す<i class="fas fa-angle-right fa-position-right"></i>
                        </button>
                @endforeach
               </div>
           </div>
       </div>
   </div>
</div>
@endsection