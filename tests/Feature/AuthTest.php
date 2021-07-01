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

    // public function set_stock()
    // {
    //     $stock = Stock::factory()->create();
    //     return $stock; 
    // }
        
    public function test_login_no_auth()
    {
        $stock = Stock::factory()->create();

        $response = $this->get('/');
        $response->assertStatus(200);

        $this->get(route('shops.index'))->assertRedirect(route('login'));
        $this->get(route('shops.create'))->assertRedirect(route('login'));
        $this->get(route('shops.show', [$stock->id]))->assertRedirect(route('login'));
        $this->get(route('shops.edit', $stock))->assertRedirect(route('login'));

        $this->get('/mycart')->assertRedirect(route('login'));
        $this->get('/mycart/payment')->assertRedirect(route('login'));


    }

    public function test_login_auth()
    {
        $user = $this->actingAs(User::factory()->create());
        $stock = Stock::factory()->create();

        $user->get('/mycart')->assertStatus(200);
        $user->get('/mycart/payment')->assertStatus(200);


        $user->get(route('shops.index'))->assertStatus(200);
        $user->get(route('shops.create'))->assertStatus(200);
        // $user->get('/shops/{$stock->id}')->assertStatus(200);
        $user->get(route('shops.show', [$stock->id]))->assertStatus(200);
        $user->get(route('shops.edit', [$stock->id]))->assertStatus(200);

    }
}
