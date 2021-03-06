<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOriginalpostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('originalposts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('shop');
            $table->string('shop_adress');
            $table->string('picture');
            $table->string('menu');
            $table->string('comment');
            $table->unsignedBigInteger('user_id');
            $table->timestamps();
            
            // 外部キー制約
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('originalposts');
    }
}
