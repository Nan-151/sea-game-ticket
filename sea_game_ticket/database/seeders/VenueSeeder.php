<?php

namespace Database\Seeders;

use App\Models\Venue;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class VenueSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $venues = 
        [
            ['name' => 'National Stadium'],
            ['name' => 'Olympic Swimming Pool'],
            ['name' => 'Nagaworld Aeon 2 Sen Sok'],
            ['name' => 'Indoor Hall'],

        ];
        foreach($venues as $venue)
        {
            Venue::create($venue);
        }
    }
}
