<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCartsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('carts', function (Blueprint $table) {
            // $table->Increments('id');
            $table->timestamps();
            $table->unsignedInteger('stock_id')->onDelete('cascade');
            $table->unsignedInteger('user_id')->onDelete('cascade');
            $table->primary(['stock_id','user_id']);
            $table->integer('stock_number');
            // $table->foreignId('stock_id')->constrained()->onDelete('cascade');　foreignIdメソッドはunsignedBigIntegerのエイリアス
            // $table->foreignId('user_id')->constrained()->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('carts');
    }
}

