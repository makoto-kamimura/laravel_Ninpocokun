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
            'cd' => 1 ,
            'sei' => '表' ,
            'mei' => '三郎' ,
            'sei_kana' => 'オモテ' ,
            'mei_kana' => 'サブロウ' ,
            'dep_cd' => 1 ,
            'div_cd' => 0 ,
            // 'taishoku_date' => '' ,
            'password' => Hash::make('abcd1234') ,
            'pos_cd' => 1 ,
            'sys_admin' => 0 ,           
        ];
        DB::table('users')->insert($param);
        $param = [
            'cd' => 8 ,
            'sei' => '工務' ,
            'mei' => '部長' ,
            'sei_kana' => 'コウム' ,
            'mei_kana' => 'ブチョウ' ,
            'dep_cd' => 10 ,
            'div_cd' => 0 ,
            // 'taishoku_date' => '' ,
            'password' => Hash::make('abcd1234') ,
            'pos_cd' => 20 ,
            'sys_admin' => 0 ,           
        ];
        DB::table('users')->insert($param);

        $param = [
            'cd' => 15 ,
            'sei' => '営業' ,
            'mei' => '部長' ,
            'sei_kana' => 'エイギョウ' ,
            'mei_kana' => 'ブチョウ' ,
            'dep_cd' => 20 ,
            'div_cd' => 10 ,
            // 'taishoku_date' => '' ,
            'password' => Hash::make('abcd1234') ,
            'pos_cd' => 20 ,
            'sys_admin' => 0 ,            
        ];
        DB::table('users')->insert($param);

        $param = [
            'cd' => 18 ,
            'sei' => '総務' ,
            'mei' => '部長' ,
            'sei_kana' => 'ソウム' ,
            'mei_kana' => 'ブチョウ' ,
            'dep_cd' => 30 ,
            'div_cd' => 0 ,
            // 'taishoku_date' => '' ,
            'password' => Hash::make('abcd1234') ,
            'pos_cd' => 20 ,
            'sys_admin' => 1 ,
        ];
        DB::table('users')->insert($param);
        
        $param = [
            'cd' => 20 ,
            'sei' => '退職済' ,
            'mei' => '課長' ,
            'sei_kana' => 'タイショクズミ' ,
            'mei_kana' => 'カチョウ' ,
            'dep_cd' => 20 ,
            'div_cd' => 20 ,
            'taishoku_date' => '2015/3/31' ,
            'password' => Hash::make('abcd1234') ,
            'pos_cd' => 25 ,
            'sys_admin' => 0 ,
        ];
        DB::table('users')->insert($param);
        
        $param = [
            'cd' => 33 ,
            'sei' => '営業' ,
            'mei' => '第１課長' ,
            'sei_kana' => 'エイギョウ' ,
            'mei_kana' => 'ダイイチカチョウ' ,
            'dep_cd' => 20 ,
            'div_cd' => 10 ,
            // 'taishoku_date' => '' ,
            'password' => Hash::make('abcd1234') ,
            'pos_cd' => 25 ,
            'sys_admin' => 0 ,            
        ];
        DB::table('users')->insert($param);
        
        $param = [
            'cd' => 41 ,
            'sei' => '営業' ,
            'mei' => '第２課長' ,
            'sei_kana' => 'エイギョウ' ,
            'mei_kana' => 'ダイニカチョウ' ,
            'dep_cd' => 20 ,
            'div_cd' => 20 ,
            // 'taishoku_date' => '' ,
            'password' => Hash::make('abcd1234') ,
            'pos_cd' => 25 ,
            'sys_admin' => 0 ,          
        ];
        DB::table('users')->insert($param);
        
        $param = [
            'cd' => 100 ,
            'sei' => '退職済' ,
            'mei' => '平社員' ,
            'sei_kana' => 'タイショクズミ' ,
            'mei_kana' => 'ヒラシャイン' ,
            'dep_cd' => 20 ,
            'div_cd' => 10 ,
            'taishoku_date' => '2019/12/31' ,
            'password' => Hash::make('abcd1234') ,
            'pos_cd' => 30 ,
            'sys_admin' => 0 ,
        ];
        DB::table('users')->insert($param);
        
        $param = [
            'cd' => 165 ,
            'sei' => '情シス' ,
            'mei' => '平社員' ,
            'sei_kana' => 'ジョウシス' ,
            'mei_kana' => 'ヒラシャイン' ,
            'dep_cd' => 30 ,
            'div_cd' => 0 ,
            // 'taishoku_date' => '' ,
            'password' => Hash::make('abcd1234') ,
            'pos_cd' => 30 ,
            'sys_admin' => 1 ,            
        ];
        DB::table('users')->insert($param);
        
        $param = [
            'cd' => 200 ,
            'sei' => '工務' ,
            'mei' => '平社員' ,
            'sei_kana' => 'コウム' ,
            'mei_kana' => 'ヒラシャイン' ,
            'dep_cd' => 10 ,
            'div_cd' => 0 ,
            // 'taishoku_date' => '' ,
            'password' => Hash::make('abcd1234') ,
            'pos_cd' => 30 ,
            'sys_admin' => 0 ,           
        ];
        DB::table('users')->insert($param);

    }
}
