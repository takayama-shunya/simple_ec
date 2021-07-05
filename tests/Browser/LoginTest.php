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
                    ->press('@login-button')
                    ->assertPathIs('/dashboard');
        });

    }

    public function create_user_login()
    {
        $this->browse(function ($browser) {
            $browser->visit('/register')
                    ->type('email', 'browser@test.com')
                    ->type('password', 'password')
                    ->tyoe('password_confirmation', 'password')
                    ->press('@register')
                    ->assertPathIs('/dashboard');
        });

        $user = User::where('email', 'browser@test.com')->get();
        $user->delete();
    }
}
