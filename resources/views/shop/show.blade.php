@extends('layouts.ecapp')

@section('content')
<div class="container-fluid">
   <div class="">
       <div class="mx-auto" style="max-width:1200px">
           <h1 style="color:#555555; text-align:center; font-size:1.2em; padding:24px 0px; font-weight:bold;">商品詳細</h1>
           <div class="">
              <div class="pb-6">
                <!-- <form action="/shops/{$stock->id}/edit" method="post"> -->
                <form action="{{ route('shops.edit', [$stock->id]) }}" method="post">
                  @csrf
                  @method('get')
                  <!-- <input type="hidden" name="stock_id" value="{{ $stock->id }}"> -->
                  <button class="btn btn--create">編集</button>
                </form>                        
              </div>

              <div class="pb-12">
                <p class="pb-2">【商品名】</p>
                <p class="pb-4">{{$stock->name}}</p>
                <p class="pb-2">【価格】</p>
                <p class="pb-4">{{$stock->fee}}</p>
                <p class="pb-2">【詳細】</p>
                <p class="pb-4">{{$stock->detail}}</p>
                <p class="pb-2">【画像】</p>
                @if ( $stock->imgpath == null )
                  <p class="pb-2 img"><img src="{{ asset('storage/images/noimage.png') }}" alt="" class="incart" ></p>
                @else
                  <p class="pb-2 img"><img src="{{ asset('storage/images/' . $stock->imgpath) }}" alt="" class="incart" ></p>
                @endif
              </div>
              </div>
           </div>
       </div>
   </div>
</div>
@endsection
