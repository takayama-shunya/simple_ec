<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class MineTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('mine')->truncate(); //2回目実行の際にシーダー情報をクリア
        DB::table('mine')->insert([
            'name' => 'takayama',
            'age' => 31,
        ]);
 
    }
}
