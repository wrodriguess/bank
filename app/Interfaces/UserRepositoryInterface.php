<?php

namespace App\Interfaces;

interface UserInterface
{
    public function index();
    public function show($userId);
}
