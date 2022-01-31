<?php


namespace App\Interfaces\Service;


interface RoleServiceInterface
{
    public function deleteUsers(int $role) : void;
}
