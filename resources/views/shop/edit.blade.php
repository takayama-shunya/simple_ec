@extends('layouts.ecapp')


@section('content')
  @if (count($errors) > 0)
    <div>
      <ul>
        @foreach($errors->all() as $error) 
          <li>{{$error}}</li>
        @endforeach
      </ul>
    </div>
  @endif
<div class="container-fluid">
   <div class="">
       <div class="mx-auto" style="max-width:1200px">
           <h1 style="color:#555555; text-align:center; font-size:1.2em; padding:24px 0px; font-weight:bold;">商品編集</h1>
           <div class="w-1/2">
             <form action="{{route('shops.update', [$stock->id])}}" method="post" enctype="multipart/form-data">
              @csrf
              @method('patch')
              <input type="hidden" name="stock_id" value="{{ $stock->id }}">
              <div class="pb-2">
                名前<br><input type="text" name="name" value="{{$stock->name}}">
              </div>
              <div class="pb-2">
                詳細<br><input type="text" name="detail" value="{{$stock->detail}}">
              </div>
              <div class="pb-2">
                値段<br><input type="text" name="fee" value="{{$stock->fee}}">
              </div>
              <div class="pb-2">
                画像<br><input type="file" name="imgpath" value="{{$stock->imgpath}}">
              </div>
              <div class="pt-6">
                <input type="submit" value="更新する" dusk="update-btn">
              </div>
             </form>
           </div>
       </div>
   </div>
</div>

@endsection