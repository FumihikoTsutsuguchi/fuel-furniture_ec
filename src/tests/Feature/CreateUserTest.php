<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Illuminate\Support\Facades\Artisan;

class CreateUserTest extends TestCase
{
    /**
     * テスト用データベースに seed を実行する
     */
    use RefreshDatabase;

    public function setUp(): void
    {
        parent::setUp();

        Artisan::call('migrate:fresh --seed');
    }

    /**
     * ユーザーを新規登録してDBに保存ができるか検証
     *
     * @return void
     */
    public function test_create_user_test()
    {
        $response = $this->post('/register', [
            'name' => 'test',
            'email' => 'test@email.com',
            'address' => '東京都千代田区',
            'tel' => '08011112222',
            'password' => 'password',
            'password_confirmation' => 'password',
        ]);

        $response->assertStatus(302)
            ->assertRedirect('/');

        $this->assertDatabaseHas('users', [
            'name'      => 'test',
            'email'     => 'test@email.com',
            'address'   => '東京都千代田区',
            'tel'       => '08011112222',
        ]);
    }
}
