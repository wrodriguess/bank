<?php

namespace App\Services;

use App\Models\User;

class UserService
{
    public function index()
    {
        $users = User::all();
        return $users;
    }

    public function show($id)
    {
        $user = User::find($id);
        $user['wallet'] = $user->wallet;
        return $user;
    }
}
