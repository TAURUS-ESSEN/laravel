<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AbfrageSeeder extends Seeder
{
    public function run()
    {
        DB::table('abfrage')->insert([
            [
                'name' => 'Max Mustermann',
                'email' => 'max@example.com',
                'about' => 'Ich bin ein angehender Magier aus Berlin, der die Magie liebt und ständig Neues lernt.',
                'school_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Anna Müller',
                'email' => 'anna@example.com',
                'about' => 'Ich möchte mich der Schule der Feuer anschließen, um meine Kräfte zu entfalten und zu wachsen.',
                'school_id' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Olaf Scholz',
                'email' => 'olaf@example.com',
                'about' => 'Ich bin ein mächtiger Nekromant, der die Geheimnisse des Todes erforscht und kontrolliert.',
                'school_id' => 6,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
