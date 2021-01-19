<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDrFlowsTable extends Migration
{
    /**
     * Run the migrations.
     * 『日報フロー』テーブル
     * @return void
     */
    public function up()
    {
        Schema::create('dr_flows', function (Blueprint $table) {
            $table->integer('dr_no');
            $table->tinyInteger('f_order');
            $table->smallInteger('user_cd');
            $table->tinyInteger('f_lv');
            $table->string('comment', 360);
            $table->dateTime('changed_at');

            $table->primary(['dr_no','f_order'],'PRI_NAME');
            $table->index('dr_no','INDEX_NAME');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('dr_flows');
    }
}
