@extends('layouts.ecapp')


@section('content')
<div class="container-fluid">
   <div class="">
       <div class="mx-auto" style="max-width:1200px">
           <h1 style="color:#555555; text-align:center; font-size:1.2em; padding:24px 0px; font-weight:bold;">商品一覧</h1>
           <div class="">
               <div class="d-flex flex-row flex-wrap">
                   商品一覧を出したい
               </div>
               <div>
               @foreach($stocks as $stock)
                    <div>
                      {{$stock->name}} <br>
                      {{$stock->fee}}円<br>
                      <img src="/image/{{$stock->imgpath}}" alt="" class="incart" >
                      <br>
                      {{$stock->detail}} <br>
                      <form action="mycart" method="post">
                        @csrf
                        <input type="hidden" name="stock_id" value="{{ $stock->id }}">
                        <input type="number" name="number" value="1" min="1" max="5">
                        <input type="submit" value="カートに入れる">
                        <button >
                          <a href="" class="btn btn--blue btn--radius btn--cubic">PUSH！<i class="fas fa-angle-right fa-position-right"></i></a>
                        </button>
                      </form>
                    </div>
                 @endforeach
                 {{$stocks->links()}} 
               </div>
           </div>
       </div>
   </div>
</div>
@endsection