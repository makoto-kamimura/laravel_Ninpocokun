<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDivisionsTable extends Migration
{
    /**
     * Run the migrations.
     * 『課』テーブル
     * @return void
     */
    public function up()
    {
        Schema::create('divisions', function (Blueprint $table) {
            $table->tinyInteger('cd');
            $table->string('name', 10);
            $table->tinyInteger('dep_cd');
            // $table->smallInteger('chief');
            
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
        Schema::dropIfExists('divisions');
    }
}
