<?php

use Illuminate\Database\Seeder;

class StatusesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $param = [
            'cd' => 1,
            'name' => '完了',
        ];
        DB::table('statuses')->insert($param);
        
        $param = [
            'cd' => 0,
            'name' => '未承認',
        ];
        DB::table('statuses')->insert($param);

        $param = [
            'cd' => -1,
            'name' => '差戻',
        ];
        DB::table('statuses')->insert($param);
    }
}
