<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run()
    {
        DB::table('users')->insert([
            [
                'name' => 'Grossmagier',
                'email' => 'magier@magic.com',
                'password' => Hash::make('LaravelIstSchmerz'),
                'role' => 'admin', 
                'active' => '1', 
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Hexer',
                'email' => 'user@magic.com',
                'password' => Hash::make('password123'),
                'role' => 'user', 
                'active' => '1', 
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Blockierter Zaubere',
                'email' => 'blocked@magic.com',
                'password' => Hash::make('password123'),
                'role' => 'user', 
                'active' => '0', 
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
