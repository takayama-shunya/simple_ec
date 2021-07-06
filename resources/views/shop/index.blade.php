@extends('layouts.ecapp')

@section('content')
<div class="container">
   <div class="">
       <div class="mx-auto" style="max-width:1200px">
           <h1 style="color:#555555; text-align:center; font-size:1.2em; padding:24px 0px; font-weight:bold;">商品一覧</h1>
           <div class="">
               <div class="pb-6">
                  商品一覧
               </div>
               <div class="flex">
                <div class="float-left">{{$stocks->links()}}</div>
                <div class="pl-12 pb-6">
                    <a href="{{ route('shops.create') }}" class="btn btn--create" dusk="shops-create-btn">新規作成</a>
                </div>
               </div>
               <div>
                  <table class="table-auto border border-collapse w-full">
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
                          <div class="md:flex md:flrex-row md:justify-evenly">
                            <div class="">
                              <!-- <form action="/shops/{$stock->id}" method="post"> -->
                              <!-- <button class="btn btn-show">
                                <a href="{{ route('shops.show', [$stock->id]) }}">詳細</a>
                              </button> -->
                              <form action="{{ route('shops.show', [$stock->id]) }}">
                                @csrf
                                @method('get')
                                <!-- <input type="hidden" name="stock_id" value="{{ $stock->id }}"> -->
                                <button class="btn btn-show" dusk="stock-show-{{$stock->id}}">詳細</button>
                              </form>
                            </div> 
                            <div class="">                       
                              <form action="{{ route('shops.destroy', [$stock->id]) }}" method="post">
                                @csrf
                                @method('delete')
                                <input type="hidden" name="stock_id" value="{{ $stock->id }}">
                                <button class="btn btn-destroy" onClick="delete_alert(event);return false;" dusk="stock-destroy-{{$stock->id}}">削除</button>
                              </form>
                            </div>
                          </div> 
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
