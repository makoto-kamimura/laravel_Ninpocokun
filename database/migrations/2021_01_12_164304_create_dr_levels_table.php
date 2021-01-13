<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDrLevelsTable extends Migration
{
    /**
     * Run the migrations.
     * 『日報利用レベル』テーブル
     * @return void
     */
    public function up()
    {
        Schema::create('dr_levels', function (Blueprint $table) {
            $table->tinyInteger('level');
            $table->string('name', 10);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('dr_levels');
    }
}
