<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Stock;
use App\Models\User;


class ShopsTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_url()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    // public function set_user()
    // {
    //     return User::factory()->create();
    // }

    public function test_stock_count()
    {
        Stock::factory(10)->create();
        $this->assertDatabaseCount('stocks', 10);
        $stock_1 = Stock::find(1);
        $this->assertInstanceOf(Stock::class, $stock_1);
        $stock_2 = Stock::find(1)->toArray();
        $expected = [
            'id', 'created_at', 'updated_at','name', 'detail', 'fee', 'imgpath', 'user_id', 
        ];
        $this->assertSame($expected, array_keys($stock_2));
    }


    public function test_stock_crud()
    {
        $date = [
            'name' => 'テスト',
            'detail' => 'CRUD機能テスト',
            'fee' => 1000,
            'imgpath' => "",    
            'user_id' => User::factory(),
        ];

        $stock = Stock::factory()->create($date);
        $this->assertDatabaseHas('stocks', [
            'name' => 'テスト',
        ]);

        $update = [
            'name' => 'updateテスト',
        ];

        $stock->update($update);
        $this->assertDatabaseHas('stocks', [
            'name' => 'updateテスト',
        ]);

        $stock->delete();
        $this->assertDatabaseMissing('stocks', [
            'name' => 'updateテスト',
        ]);
        $this->assertDeleted($stock);

    }
}
