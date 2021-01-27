<?php

use Illuminate\Database\Seeder;

class PositionsTableSeeder extends Seeder
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
            'name' => '社長',
            // 'lv' => 100,
        ];
        DB::table('positions')->insert($param);

        // $param = [
        //     'cd' => 5,
        //     'name' => '専務',
        //     // 'lv' => 90,
        // ];
        // DB::table('positions')->insert($param);

        // $param = [
        //     'cd' => 10,
        //     'name' => '常務',
        //     // 'lv' => 80,
        // ];
        // DB::table('positions')->insert($param);

        // $param = [
        //     'cd' => 15,
        //     'name' => '役員',
        //     // 'lv' => 70,
        // ];
        // DB::table('positions')->insert($param);

        $param = [
            'cd' => 20,
            'name' => '部長',
            // 'lv' => 60,
        ];
        DB::table('positions')->insert($param);

        $param = [
            'cd' => 25,
            'name' => '課長',
            // 'lv' => 50,
        ];
        DB::table('positions')->insert($param);

        $param = [
            'cd' => 30,
            'name' => '一般社員',
            // 'lv' => 40,
        ];
        DB::table('positions')->insert($param);

        
        // $param = [
        //     'cd' => 35,
        //     'name' => '嘱託社員',
        //     // 'lv' => 30,
        // ];
        // DB::table('positions')->insert($param);

        
        // $param = [
        //     'cd' => 45,
        //     'name' => '契約社員',
        //     // 'lv' => 20,
        // ];
        // DB::table('positions')->insert($param);

        
        // $param = [
        //     'cd' => 50,
        //     'name' => '派遣社員',
        //     // 'lv' => 10,
        // ];
        // DB::table('positions')->insert($param);

    }
}
