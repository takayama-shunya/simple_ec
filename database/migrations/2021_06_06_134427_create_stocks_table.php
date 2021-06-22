<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStocksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stocks', function (Blueprint $table) {
            $table->Increments('id');
            $table->timestamps();
            $table->string('name','100');
            $table->string('detail','500');
            $table->integer('fee');
            $table->string('imgpath','200')->nullable();
            $table->unsignedInteger('user_id')->onDelete('cascade');
            // $table->foreign('user_id')->references('id')->on('users');
            // $table->foreignId('user_id')->constrained('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('stocks');
    }
}
