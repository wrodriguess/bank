<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class WalletSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('wallets')->insert([
            [
                'user_id' => 1,
                'balance' => 1212.50,
            ],
            [
                'user_id' => 2,
                'balance' => 6000.00,
            ],
            [
                'user_id' => 3,
                'balance' => 2000.00,
            ],
        ]);
    }
}
