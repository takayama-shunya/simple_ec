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
                  <table class="table-auto border border-collapse w-1/2">
                    <thead>
                      <tr>
                        <th class="border border-green-600">ID</th>
                        <th>商品名</th>
                        <th>値段</th>
                        <th></th>
                      </tr>
                    </thead>
                    @foreach($stocks as $stock)
                    <tbody>
                      <tr>
                        <td>{{$stock->id}}</td>
                        <td>{{$stock->name}}</td>
                        <td>{{$stock->fee}}</td>
                        <td>詳細</td>
                        <td>削除</td>
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
