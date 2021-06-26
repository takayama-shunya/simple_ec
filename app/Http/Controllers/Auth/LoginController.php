<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Auth;


class LoginController extends Controller
{
    // public function redirectToProvider(Request $request) {

    //     $provider = $request->provider;
    //     return Socialite::driver($provider)->redirect();

    // }

    // public function handleProviderCallback(Request $request) {

    //     $provider = $request->provider;
    //     $social_user = Socialite::driver($provider)->user();
    //     $social_email = $social_user->getEmail();
    //     $social_name = $social_user->getName();

    //     if(!is_null($social_email)) {

    //         $user = User::firstOrCreate([
    //             'email' => $social_email
    //         ], [
    //             'email' => $social_email,
    //             'name' => $social_name,
    //             'password' => Hash::make(Str::random())
    //         ]);

    //         auth()->login($user);
    //         return redirect('/dashboard');

    //     }

    //     return '必要な情報が取得できていません。';

    // }

    public function socialLogin($social)
    {
        return Socialite::driver($social)->redirect();
    }
 
    //Callback処理
    public function handleProviderCallback($social)
    {
        //ソーシャルサービス（情報）を取得
        $userSocial = Socialite::driver($social)->stateless()->user();
        //emailで登録を調べる
        $user = User::where(['email' => $userSocial->getEmail()])->first();
 
        //登録（email）の有無で分岐
        if($user){
 
            //登録あればそのままログイン（2回目以降）
            Auth::login($user);
            return redirect('/');
 
        }else{
 
            //なければ登録（初回）
            $newuser = new User;
            $newuser->name = $userSocial->getName();
            $newuser->email = $userSocial->getEmail();
            $newuser->save();
 
            //そのままログイン
            Auth::login($newuser);
            return redirect('/');
 
        }
    }
}