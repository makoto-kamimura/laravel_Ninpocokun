<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     * 『社員』テーブル
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            // $table->bigIncrements('id');
            // $table->string('name');
            // $table->string('email')->unique();
            // $table->timestamp('email_verified_at')->nullable();
            // $table->string('password');
            // $table->rememberToken();
            // $table->timestamps();
            $table->smallInteger('cd');
            $table->string('sei', 6);
            $table->string('mei', 10);
            $table->string('sei_kana', 10);
            $table->string('mei_kana', 20);
            $table->tinyInteger('dep_cd');
            $table->tinyInteger('div_cd');
            // $table->date('nyusha_date');
            $table->date('taishoku_date')->nullable()->default(null);
            $table->string('password', 60);
            $table->tinyInteger('pos_cd');
            $table->tinyInteger('sys_admin');
            $table->rememberToken();
            
            $table->primary('cd','PRI_NAME');
            $table->index('cd','INDEX_NAME');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
