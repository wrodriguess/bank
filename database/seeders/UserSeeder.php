<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'name' => "William",
                'cpf' => "78434588080",
                'email' => "william@gmail.com",
                'password' => "a6c98aca02fdfb501b26098b98879285",
            ],
            [
                'name' => "Rafael",
                'cpf' => "27860252066",
                'email' => "rafael@gmail.com",
                'password' => "9f2a44e7b74f4f9f8d1364f1d5bcb03e",
            ],
            [
                'name' => "Maria",
                'cpf' => "70817714081",
                'email' => "mari@gmail.com",
                'password' => "f01632db8bb35e73cad1f86ca78761ca",
            ],
        ]);
    }
}
