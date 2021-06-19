<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Stock;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;

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
            'image' => 'file|image|max:2000|nullable'
        ])->validate();  

        if($request->imgpath != null) {
            $file = $request->file('imgpath');
            $fileName = Str::random(10).'.'.$file->getClientOriginalExtension();
            Image::make($file)->save(public_path('images/'.$fileName));
        }
       
       $stock = new Stock;
       $stock->user_id = $request->user()->id;
       $form = $request->all();
       unset($form['_token']);

    //    $stock->name = $request->name;
    //    $stock->detail = $request->detail;
    //    $stock->imgpath = $request->imgpath;
    //    $stock->fee = $request->fee;
    //    $form = $request->all();
    //    unset($form['_token']);
       
       if($stock->fill($form)->save()) {
    //    if($stock->save()) {
            session()->flash('flash_message', '商品作成しました');
            return redirect('/shops');
       }
       else {
            session()->flash('flash_message', 'エラーが発生しました');
            return redirect('/shops');
       }
  
       return redirect()->back();
    }

}
