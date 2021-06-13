<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StockTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       DB::table('stocks')->truncate(); //2回目実行の際にシーダー情報をクリア　一括削除
       DB::table('stocks')->insert([
           'name' => 'フィルムカメラ',
           'detail' => '1960年式のカメラです',
           'fee' => 200000,
           'imgpath' => 'filmcamera.jpg',
           'user_id' => 1,
       ]);

       DB::table('stocks')->insert([
           'name' => 'イヤホン',
           'detail' => 'ノイズキャンセリングがついてます',
           'fee' => 20000,
           'imgpath' => 'iyahon.jpg',
           'user_id' => 1,
       ]);

       DB::table('stocks')->insert([
           'name' => '時計',
           'detail' => '1980年式の掛け時計です',
           'fee' => 120000,
           'imgpath' => 'clock.jpg',
           'user_id' => 1,
       ]);

       DB::table('stocks')->insert([
           'name' => '地球儀',
           'detail' => '珍しい商品です',
           'fee' => 120000,
           'imgpath' => 'earth.jpg',
           'user_id' => 1,
       ]);


       DB::table('stocks')->insert([
           'name' => '腕時計',
           'detail' => 'プレゼントにどうぞ',
           'fee' => 9800,
           'imgpath' => 'watch.jpg',
           'user_id' => 1,
       ]);

       DB::table('stocks')->insert([
           'name' => 'カメラレンズ35mm',
           'detail' => '最新式です',
           'fee' => 79800,
           'imgpath' => 'lens.jpg',
           'user_id' => 1,
       ]);

       DB::table('stocks')->insert([
           'name' => 'シャンパン',
           'detail' => 'パーティにどうぞ',
           'fee' => 800,
           'imgpath' => 'shanpan.jpg',
           'user_id' => 1,
           ]);

       DB::table('stocks')->insert([
           'name' => 'ビール',
           'detail' => '大量生産されたビールです',
           'fee' => 200,
           'imgpath' => 'beer.jpg',
           'user_id' => 1,
       ]);

       DB::table('stocks')->insert([
           'name' => 'やかん',
           'detail' => 'かなり珍しいやかんです',
           'fee' => 1200,
           'imgpath' => 'yakan.jpg',
           'user_id' => 1,
       ]);

       DB::table('stocks')->insert([
           'name' => '精米',
           'detail' => '米30Kgです',
           'fee' => 11200,
           'imgpath' => 'kome.jpg',
           'user_id' => 1,
       ]);

       DB::table('stocks')->insert([
           'name' => 'パソコン',
           'detail' => 'ジャンク品です',
           'fee' => 11200,
           'imgpath' => 'pc.jpg',
           'user_id' => 1,
       ]);

       DB::table('stocks')->insert([
           'name' => 'アコースティックギター',
           'detail' => 'ヤマハ製のエントリーモデルです',
           'fee' => 25600,
           'imgpath' => 'aguiter.jpg',
           'user_id' => 1,
       ]);

       DB::table('stocks')->insert([
           'name' => 'エレキギター',
           'detail' => '初心者向けのエントリーモデルです',
           'fee' => 15600,
           'imgpath' => 'eguiter.jpg',
           'user_id' => 1,
       ]);

       DB::table('stocks')->insert([
           'name' => '加湿器',
           'detail' => '乾燥する季節の必需品',
           'fee' => 3200,
           'imgpath' => 'steamer.jpeg',
           'user_id' => 1,
       ]);

       DB::table('stocks')->insert([
           'name' => 'マウス',
           'detail' => 'ゲーミングマウスです',
           'fee' => 4200,
           'imgpath' => 'mouse.jpeg',
           'user_id' => 1,
       ]);

       DB::table('stocks')->insert([
           'name' => 'Android Garxy10',
           'detail' => '中古美品です',
           'fee' => 84200,
           'imgpath' => 'mobile.jpg',
           'user_id' => 1,
       ]);

    }
}
