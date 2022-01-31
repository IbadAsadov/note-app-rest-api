<?php


namespace Tests\Controller\UserController\Negative\InvalidInput;


use App\Models\User;
use Tests\TestCase;

class UserApiTest extends TestCase
{

    public function test_show()
    {
        $user = $this->user();
        $parameter = User::getNewId();

        $this->actingAs($user)->get(route('users.show', ["user" => $parameter]))
            ->assertStatus(404);
    }

    public function test_update()
    {
        $user = $this->user();
        $formData = [
            'name' => 'updated name',
            'email' => 'updated@gmail.com',
        ];
        $parameter = User::getNewId();

        $this->actingAs($user)->put(route('users.update', ["user" => $parameter]), $formData)
            ->assertStatus(404);
    }


    public function test_delete()
    {
        $user = $this->user();
        $parameter = User::getNewId();

        $this->actingAs($user)->delete(route('users.destroy', ["user" => $parameter]))
            ->assertStatus(404);
    }
}
