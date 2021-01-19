<?php

use Illuminate\Database\Seeder;

class DrLevelsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $param = [
            'level' => 10,
            'name' => '確認',
        ];
        DB::table('dr_levels')->insert($param);

        $param = [
            'level' => 30,
            'name' => '承認',
        ];
        DB::table('dr_levels')->insert($param);

        $param = [
            'level' => 50,
            'name' => '編集',
        ];
        DB::table('dr_levels')->insert($param);
    }
}
