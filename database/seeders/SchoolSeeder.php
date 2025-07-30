<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SchoolSeeder extends Seeder
{
    public function run()
    {
        DB::table('schools')->insert([
            ['name' => 'Feuer'],
            ['name' => 'Eis'],
            ['name' => 'Erd'],
            ['name' => 'Luft'],
            ['name' => 'BlackMagic'],
            ['name' => 'Necromanty'],
        ]);
    }
}