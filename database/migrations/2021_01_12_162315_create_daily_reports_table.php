<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDailyReportsTable extends Migration
{
    /**
     * Run the migrations.
     * 【データ長未決定】『日報』テーブル 
     * @return void
     */
    public function up()
    {
        Schema::create('daily_reports', function (Blueprint $table) {
            $table->integer('no');
            $table->smallInteger('post_user_cd');
            $table->smallInteger('auth_user_cd');
            $table->string('sagyou', 360);
            $table->string('shintyoku', 360);
            $table->string('zansagyou', 360);
            $table->string('hikitsugi', 360);
            $table->string('comment', 360)->nullable()->default(null);
            $table->tinyInteger('status')->default(0);
            // $table->date('target_date');
            $table->timestamps();


            $table->primary('no','PRI_NAME');
            $table->index(['no','post_user_cd'],'INDEX_NAME');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('daily_reports');
    }
}
