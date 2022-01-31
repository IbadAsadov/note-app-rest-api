<?php


namespace Tests\Controller\AuthController\Positive;


use Tests\TestCase;

class AuthApiTest extends TestCase
{
    public function test_signin()
    {
        $formData = [
            'email'  => 'dev1@gmail.com',
            'password' => '123456789',
        ];


        $this->post(route('login'), $formData)
            ->assertStatus(200);
    }

}
