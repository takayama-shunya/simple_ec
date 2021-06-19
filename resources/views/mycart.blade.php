@extends('layouts.ecapp')


@section('content')
<div class="container-fluid">
   <div class="">
       <div class="mx-auto" style="max-width:1200px">
           <h1 style="color:#555555; text-align:center; font-size:1.2em; padding:24px 0px; font-weight:bold;">カート商品一覧</h1>
           <div class="">
               <div class="d-flex flex-row flex-wrap pb-12">
                   カート商品一覧
                   <a href="{{ route('payment') }}" class="btn btn btn-solid-gold mx-8">購入に進む</a>
                   <!-- <button class="btn btn btn-solid-gold mx-8" type=“button” onclick="location.href='https://techacademy.jp/magazine/'">
                      購入に進む
                   </button> -->
               </div>
               <div>
                @foreach($my_carts as $cart)
                  <div class="pb-12"> 
                      <p class="pb-2">{{$cart->stock->name}} : {{$cart->stock->fee}}円</p>
                      @if ($cart->stock->imgpath == null )
                        <p class="pb-2"><img src="/images/noimage.png" alt="" class="incart" ></p>
                      @else
                        <p class="pb-2"><img src="/image/{{$cart->stock->imgpath}}" alt="" class="incart" ></p>
                      @endif
                      <p class="pb-2">{{$cart->stock->detail}}</p>
                      <p class="pb-2">{{$cart->stock_number}}個</p>
                      <form action="/mycart{stock->id}" method="post">
                        @csrf
                        @method('delete')
                        <input type="hidden" name="stock_id" value="{{ $cart->stock->id }}">
                        <!-- <input type="number" name="number" value="1" min="1" max="5"> -->
                        <button class="btn btn--red btn--radius btn--cubic mx-8">
                          カートから消す<i class="fas fa-angle-right fa-position-right"></i>
                        </button>
                      </form>
                  </div>
                @endforeach
               </div>
           </div>
       </div>
   </div>
</div>
@endsection