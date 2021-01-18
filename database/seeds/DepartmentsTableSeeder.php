<?php

use Illuminate\Database\Seeder;
use App\Department;

class DepartmentsTableSeeder extends Seeder
{
    /**
     * 『部門』テーブルシーダー
     *
     * @return void
     */
    public function run()
    {
        $param = [
            'cd' => 1,
            'name' => '社長',
            // 'chief' => 1,
        ];
        DB::table('departments')->insert($param);

        $param = [
            'cd' => 10,
            'name' => '工務部',
            // 'chief' => 8,
        ];
        DB::table('departments')->insert($param);

        $param = [
            'cd' => 20,
            'name' => '営業部',
            // 'chief' => 15,
        ];
        DB::table('departments')->insert($param);

        $param = [
            'cd' => 30,
            'name' => '総務部',
            // 'chief' => 18,
        ];
        DB::table('departments')->insert($param);

    }
}
