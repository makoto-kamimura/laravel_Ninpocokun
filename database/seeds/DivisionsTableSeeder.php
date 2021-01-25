<?php

use Illuminate\Database\Seeder;

class DivisionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $param = [
            'cd' => 10,
            'name' => '第1課',
            'dep_cd' => 20,
            // 'chief' => 33,
        ];
        DB::table('divisions')->insert($param);

        $param = [
            'cd' => 20,
            'name' => '第2課',
            'dep_cd' => 20,
            // 'chief' => 41,
        ];
        DB::table('divisions')->insert($param);

    }
}
