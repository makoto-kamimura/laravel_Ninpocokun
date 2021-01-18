<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $param = [
            // 'cd' => ,
            // 'sei' => ,
            // 'mei' => ,
            // 'sei_kana' => ,
            // 'mei_kana' => ,
            // 'dep_cd' => ,
            // 'div_cd' => ,
            // 'nyusha_date' => ,
            // 'taishoku_date' => ,
            // 'password' => ,
            // 'yaku_cd' => ,
            // 'sys_admin' => ,
            
        ];
        DB::table('users')->insert($param);
    }
}
