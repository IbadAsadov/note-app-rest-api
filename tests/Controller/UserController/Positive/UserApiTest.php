<?php


namespace Tests\Controller\UserController\Positive;


use App\Models\User;
use Tests\TestCase;

class UserApiTest extends TestCase
{
    public function test_index()
    {
        $user = $this->user();

        $this->actingAs($user)->get(route('users.index'))
            ->assertStatus(200);
    }

    public function test_store()
    {
        $user = $this->user();
        $formData = [
            'name' => 'New user',
            'email' => 'email@gmail.com',
            'password' => '123456789',
            'confirm_password' => '123456789',
        ];

        $this->actingAs($user)->post(route('users.store'), $formData)
            ->assertStatus(201);
    }

    public function test_show()
    {
        $user = $this->user();
        $parameter = User::first();

        $this->actingAs($user)->get(route('users.show', ["user" => $parameter->id]))
            ->assertStatus(200);
    }

    public function test_update()
    {
        $user = $this->user();
        $formData = [
            'name' => 'updated name',
            'email' => 'updated@gmail.com',
        ];
        $parameter = User::first();

        $this->actingAs($user)->put(route('users.update', ["user" => $parameter->id]), $formData)
            ->assertStatus(200);
    }


    public function test_delete()
    {
        $user = $this->user();
        $parameter = User::first();

        $this->actingAs($user)->delete(route('users.destroy', ["user" => $parameter->id]))
            ->assertStatus(200);
    }
}
