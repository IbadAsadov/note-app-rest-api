<?php


namespace Tests;


trait User
{
    public function user()
    {
        return \App\Models\User::first();
    }
}
