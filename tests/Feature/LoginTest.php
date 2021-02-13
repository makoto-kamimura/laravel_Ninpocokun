<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class LoginTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */

    // ログイン情報確認
     public function testLoginConfirm()
    {
        $response = $this->get('/');
        $response->assertStatus(302);
    }

    // ログイン画面表示
     public function testLoginView()
    {
        // $response = $this->get('/');
        // dd($response);
        // $response->assertStatus(302);
    }

    // ログイン画面表示項目確認
    public function testLoginViewConfirm()
    {
        // $response = $this->get('/');
        // dd($response);
        // $response->assertStatus(302);
    }

    // テストユーザーログイン
    public function testLogin()
    {
        // $response = $this->get('/');
        // dd($response);
        // $response->assertStatus(302);
    }

}
