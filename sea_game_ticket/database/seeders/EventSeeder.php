<?php

namespace Database\Seeders;

use App\Models\Event;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EventSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $events = 
        [
            ["title" => "Men's football U-22 group A", "date" => "2023-05-02", 'venue_id' => 1, "category_id" => 1],
            ["title" => "Men's volleybal", "date" => "2023-05-02", 'venue_id' => 4, "category_id" => 7],

        ];
        foreach($events as $event)
        {
            Event::create($event);
        }
    }
}
