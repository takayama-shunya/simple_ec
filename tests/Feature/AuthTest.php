<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;
use App\Models\Stock;

class AuthTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic feature test example.
     *
     * @return void
     */

    // public function stock_set()
    // {
    //     $this->stock = Stock::factory()->create();
    // }
    
    public function test_login_no_auth()
    {
        $stock = Stock::factory()->create();

        $response = $this->get('/');
        $response->assertStatus(200);

        $this->get(route('shops.index'))->assertRedirect(route('login'));
        $this->get(route('shops.create'))->assertRedirect(route('login'));
        $this->get(route('shops.show', $stock))->assertRedirect(route('login'));
        $this->get(route('shops.edit', $stock))->assertRedirect(route('login'));

        // $this->get('/mycart')->assertRedirect(route('login'));
        // $this->get('/mycart/payment')->assertRedirect(route('login'));

        // $user = $this->actingAs(
        //     User::factory()->create()
        // );
    }
}
