<?php

namespace App\Repositories;

use App\Interfaces\UserRepositoryInterface;
use App\Models\User;

class UserRepository implements UserRepositoryInterface
{

    public function index()
    {
        return User::all();
    }
    public function show($userId)
    {
        return User::findOrFail($userId);
    }
}
