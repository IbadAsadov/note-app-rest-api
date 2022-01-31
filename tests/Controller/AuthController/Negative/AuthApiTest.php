<?php


namespace Tests\Controller\AuthController\Negative;


use Tests\TestCase;

class AuthApiTest extends TestCase
{

    public function test_signin()
    {
        $formData = [
            'email'  => 'test.com',
            'password' => '123456789',
        ];


        $this->post(route('login'), $formData)
            ->assertStatus(400);
    }
}
