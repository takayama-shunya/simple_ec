<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;
use App\Models\User;
use App\Models\Stock;

class ShopsTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     *
     * @return void
     */
    public function test_crud_stock()
    {
        // create
        $this->browse(function (Browser $browser) {
            $browser->loginAs(User::find(1))
                    ->visit('/shops')
                    ->click('@shops-create-btn');
            $browser->type('name', 'ブラウザテスト')
                    ->type('detail', 'create test')
                    ->type('fee', 100)
                    // ->type('imgpath', '')
                    ->press('@create-btn');
        });

        $this->assertDatabaseHas('stocks', [
            'detail' => 'create test',
        ]);

        $stock = Stock::where('detail', 'create test')->first();

        //show update 
        $this->browse(function (Browser $browser) use ($stock) {
            $browser->visit('/shops?page=2')
                    // ->scrollIntoView("@stock-show-{$stock->id}")
                    ->press("@stock-show-{$stock->id}")
                    ->assertSee('create test')
                    ->press('@shops-edit-btn');
            $browser->type('detail', 'update test')
                    ->press('@update-btn');
            
            $this->assertDatabaseHas('stocks', [
                'detail' => 'update test',
            ]);



            
        });

        //destroy
        $this->browse(function (Browser $browser) use ($stock) {
            $browser->visit('/shops?page=2')
                    ->press("@stock-destroy-{$stock->id}")
                    ->acceptDialog();
                    // ->whenAvailable('.modal', function ($modal) {
                    //     $modal->assertSee('本当に削除しますか？')
                    //           ->press('OK');
                    // });
            
            $this->assertDatabaseMissing('stocks', [
                'name' => 'updateテスト',
            ]);
            

        });

        // $stock->delete();
        // $this->assertDeleted($stock);
    }
}
