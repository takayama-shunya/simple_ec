<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;
use App\Models\User;

class LoginTest extends DuskTestCase
{

    // use DatabaseMigrations;

    /**
     * A Dusk test example.
     *
     * @return void
     */
    public function test_home_page()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/')
                    ->assertSee('商品一覧');
        });
    }

    public function test_login()
    {
        $user = User::find(1);

        $this->browse(function ($browser) use ($user) {
            $browser->visit('/login')
                    ->type('email', $user->email)
                    ->type('password', 'password')
                    // ->press('Login')
                    ->press('@login-button')
                    ->assertPathIs('/dashboard');
        });

    }
}
