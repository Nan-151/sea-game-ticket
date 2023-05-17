<?php

namespace Database\Seeders;

use App\Models\Zone;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ZoneSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $zones = 
        [
            ['name' => 'A', 'number_of_seat' => 1000, 'venue_id' => 1],
            ['name' => 'B', 'number_of_seat' => 1000, 'venue_id' => 1],
            ['name' => 'C', 'number_of_seat' => 1000, 'venue_id' => 1],
            ['name' => 'D', 'number_of_seat' => 1000, 'venue_id' => 1],
            ['name' => 'E', 'number_of_seat' => 1000, 'venue_id' => 2],
        ];
        foreach($zones as $zone)
        {
            Zone::create($zone);
        }
    }
}
