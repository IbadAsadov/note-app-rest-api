<?php

namespace App\Observers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;

class UserObserver
{
    public function creating(User $user) : void
    {
        if (Auth::check()) {
            $user->created_by = auth()->user()->id;
        } else {
            $user->created_by = 1;
        }
    }

    public function updating(User $user) : void
    {
        $user->updated_by = auth()->user()->id;
    }

    public function deleting(User $user) : void
    {
        $user->deleted_by = auth()->user()->id;
    }
}
