<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('name');//カラム削除
            $table->string('user_name', 30);//カラム追加
            $table->dropColumn('barth');//カラム削除
            $table->date('birthday')->nullable();//カラム追加
            $table->dropColumn('web');//カラム削除
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('user_name');
            $table->string('user', 30);
            $table->dropColumn('birthday');
            $table->dateTime('barth')->nullable();
            $table->string('web', 100)->nullable();
        });
    }
}
