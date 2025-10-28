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
            'balance' => 10000,
        ]);

        User::create([
            'name' => 'test2',
            'balance' => 15000,
        ]);
    }
}
