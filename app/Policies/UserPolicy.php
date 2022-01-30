<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy
{
    use HandlesAuthorization;

    public function create(User $user)
    {
        return $user->email == 'admin@example.com';
    }

    public function edit(User $user)
    {
        return $user->email == 'admin@example.com';
    }
}
