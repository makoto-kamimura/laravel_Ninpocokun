<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDepartmentsTable extends Migration
{
    /**
     * Run the migrations.
     * 『部門』テーブル
     * @return void
     */
    public function up()
    {
        Schema::create('departments', function (Blueprint $table) {
            // $table->bigIncrements('id');
            // $table->timestamps();
            $table->tinyInteger('cd');
            $table->string('name', 10);
            $table->smallInteger('chief');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('departments');
    }
}
