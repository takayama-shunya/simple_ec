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
    public function test_example()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function test_stock_count()
    {
        $user = User::factory()->create();
        // Laravel8以降、Globalなfactory関数は廃止され、Modelから呼び出す形となりました
        Stock::factory()
            ->count(10)
            ->for($user)
            ->create();

        $this->assertDatabaseCount('stocks', 10);

    }
}
