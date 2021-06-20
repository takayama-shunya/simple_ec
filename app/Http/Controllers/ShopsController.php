<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Stock;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Log;

class ShopsController extends Controller
{
    public function home()
    {
        $stocks = Stock::orderBy('created_at', 'asc')->paginate(10);
        return view('shop/home',compact('stocks'));
    }

    public function index()
    {
        $stocks = Stock::orderBy('created_at', 'asc')->paginate(10);
        return view('shop/index',compact('stocks'));
    }


    public function create()
    {
        return view('shop/create');
    }

    public function store(Request $request)
    {
        Validator::make($request->all(), [
            'imgpath' => 'file|image|max:2000|nullable'
        ])->validate();  

        if($request->imgpath != null) {
            $file = $request->file('imgpath');
            $fileName = Str::random(10).'.'.$file->getClientOriginalExtension();
            Image::make($file)->resize(300, 300)->save(public_path('images/'.$fileName));
        }
       
       $stock = new Stock;
    //    $stock->user_id = $request->user()->id;
    //    $form = $request->all();
    //    unset($form['_token']);

       $stock->name = $request->name;
       $stock->user_id = $request->user()->id;
       $stock->detail = $request->detail;
       $stock->imgpath = $fileName;
       $stock->fee = $request->fee;
       
    //    if($stock->fill($form)->save()) {
       if($stock->save()) {
            session()->flash('flash_message', '商品作成しました');
            return redirect('/shops');
       }
       else {
            session()->flash('flash_message', 'エラーが発生しました');
            return redirect('/shops');
       }
  
       return redirect()->back();
    }

    public function destroy(Request $request)
    {
        $stock = Stock::find($request->stock_id);
        // ->firstOrFail();
        if($stock->delete()){
            session()->flash('flash_message', '商品を削除しました');
            return redirect('/shops');
        }
        else{
            session()->flash('flash_message', '失敗しました');
            return redirect('/shops');
        }
    }

    public function show(Request $request)
    {
        $stock = Stock::find($request->stock_id);
        return view('shop/show', compact('stock'));
    }

    public function edit(Request $request)
    {
        $stock = Stock::find($request->stock_id);
        return view('shop/edit', compact('stock'));
    }

}
