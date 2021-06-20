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
               <div class="pb-6">
                  <a href="{{ route('shops.create') }}" class="btn btn--create">新規作成</a>
               </div>
               <div>
                  <table class="table-auto border border-collapse w-1/2">
                    <thead>
                      <tr>
                        <th class="border">ID</th>
                        <th class="border">商品名</th>
                        <th class="border">値段</th>
                        <th class="border"></th>
                      </tr>
                    </thead>
                    @foreach($stocks as $stock)
                    <tbody>
                      <tr>
                        <td class="border">{{$stock->id}}</td>
                        <td class="border">{{$stock->name}}</td>
                        <td class="border">{{$stock->fee}}</td>
                        <td class="border">
                          <form action="/shops/{$stock->id}" method="post">
                            @csrf
                            @method('get')
                            <input type="hidden" name="stock_id" value="{{ $stock->id }}">
                            <button class="btn btn-show">詳細</button>
                          </form>                        
                          <form action="/shops/{$stock->id}" method="post">
                            @csrf
                            @method('delete')
                            <input type="hidden" name="stock_id" value="{{ $stock->id }}">
                            <button class="btn btn-destroy" onClick="delete_alert(event);return false;" >削除</button>
                          </form>
                        </td>
                      </tr>
                    </tbody>
                    @endforeach
                  </table>
               </div>
               <div class="float-left">{{$stocks->links()}}</div>
           </div>
       </div>
   </div>
</div>
@endsection
