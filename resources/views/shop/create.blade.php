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
           <h1 style="color:#555555; text-align:center; font-size:1.2em; padding:24px 0px; font-weight:bold;">商品作成</h1>
           <div class="w-1/2">
             <form action="{{route('shops.store')}}" method="post" enctype="multipart/form-data">
              {{csrf_field() }}
              <div class="pb-2">
                名前<br><input type="text" name="name" value="{{old('name')}}">
              </div>
              <div class="pb-2">
                詳細<br><input type="text" name="detail" value="{{old('detail')}}">
              </div>
              <div class="pb-2">
                値段<br><input type="text" name="fee" value="{{old('fee')}}">
              </div>
              <div class="pb-2">
                画像<br><input type="file" name="imgpath" value="{{old('imgpath')}}">
              </div>
              <div class="pt-6">
                <input type="submit" value="登録する">
              </div>
             </form>
           </div>
       </div>
   </div>
</div>

@endsection