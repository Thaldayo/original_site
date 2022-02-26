<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RollbackUserLikeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('user_like', function (Blueprint $table) {
            //外部キー制約の削除
            $table->dropForeign('user_like_post_id_foreign');
            $table->foreign('post_id')->references('id')->on('originalposts')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('user_like', function (Blueprint $table) {
            $table->dropForeign('user_like_post_id_foreign');
            $table->foreign('post_id')->references('id')->on('users')->onDelete('cascade');
        });
    }
}
