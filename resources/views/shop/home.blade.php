@extends('layouts.ecapp')


@section('content')
<div class="container-fluid">
   <div class="">
       <div class="mx-auto" style="max-width:1200px">
           <h1 style="color:#555555; text-align:center; font-size:1.2em; padding:24px 0px; font-weight:bold;">商品一覧</h1>
           <div class="">
               <div class="d-flex flex-row flex-wrap pb-6">
                   商品一覧
               </div>
               <div>
                @foreach($stocks as $stock)
                    <div class="pb-12">
                      <p class="pb-2">{{$stock->name}} : {{$stock->fee}}円</p>
                      @if ( $stock->imgpath == null )
                        <p class="pb-2"><img src="/images/noimage.png" alt="" class="incart" ></p>
                      @else
                        <p class="pb-2"><img src="/images/{{$stock->imgpath}}" alt="" class="incart" ></p>
                      @endif
                      <p class="pb-2">{{$stock->detail}}</p>
                      <form action="mycart" method="post">
                        @csrf
                        <input type="hidden" name="stock_id" value="{{ $stock->id }}">
                        <input type="number" name="number" value="1" min="1" max="5">
                        <!-- <input type="submit" value="カートに入れる"> -->
                        <button class="btn btn--blue btn--radius btn--cubic mx-8">
                          カートにいれる<i class="fas fa-angle-right fa-position-right"></i>
                        </button>
                      </form>
                    </div>
                @endforeach
               </div>
               <div class="float-left">{{$stocks->links()}}</div>
           </div>
       </div>
   </div>
</div>
@endsection