<?php

namespace Database\Seeders;

use App\Models\Sport;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SportSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $sports = 
        [
            ['name' => 'Football'],
            ['name' => 'Basketball'],
            ['name' => 'Boxing'],
            ['name' => 'Cycling'],
            ['name' => 'E-Sports'],
            ['name' => 'Golf'],
            ['name' => 'Indoor Volleyball'],
            ['name' => 'Judo'],
            ['name' => 'Beach Volleyball'],
            ['name' => 'Kun Khmer'],
            ['name' => 'Table tennis'],
            ['name' => 'Ju-Jitsu'],
            ['name' => 'Chess'],
            ['name' => 'Sambo'],
        ];
        foreach($sports as $sport)
        {
            Sport::create($sport);
        }

    }
}
