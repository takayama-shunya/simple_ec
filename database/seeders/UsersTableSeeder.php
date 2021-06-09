<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory()->count(2)->create();
        DB::table('users')->truncate(); //2回目実行の際にシーダー情報をクリア　一括削除
        DB::table('users')->insert([
            'name' => 'admin',
            'email' => 'admin@icloud.com',
            'password' => 'password',
            'admin' => true,
        ]);
        DB::table('users')->insert([
            'name' => 'test',
            'email' => 'test@icloud.com',
            'password' => 'password',
            'admin' => false,
        ]);

    }
}
