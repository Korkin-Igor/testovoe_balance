<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'test1',
            'phone' => '89999999999',
            'password' => bcrypt('password'),
            'balance' => 10000,
        ]);

        User::create([
            'name' => 'test2',
            'phone' => '89876543210',
            'password' => bcrypt('password'),
            'balance' => 15000,
        ]);
    }
}
