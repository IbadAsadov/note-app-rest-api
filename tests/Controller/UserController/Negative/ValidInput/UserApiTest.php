<?php


namespace Tests\Controller\UserController\Negative\ValidInput;


use App\Models\User;
use Tests\TestCase;

class UserApiTest extends TestCase
{
    public function test_store()
    {
        $user = $this->user();
        $formData = [
            'name' => 'New user',
            'email' => 'email@gmail.com',
            'password' => '123456789',
            'confirm_password' => '123456789sdf',
        ];

        $this->actingAs($user)->post(route('users.store'), $formData)
            ->assertStatus(400);
    }

    public function test_update()
    {
        $user = $this->user();
        $formData = [
            'name' => 'updated name',
            'email' => 'updatemail.com',
        ];
        $parameter = User::first();

        $this->actingAs($user)->put(route('users.update', ["user" => $parameter->id]), $formData)
            ->assertStatus(400);
    }

}
