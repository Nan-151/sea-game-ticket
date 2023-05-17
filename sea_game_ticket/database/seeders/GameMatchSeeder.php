<?php

namespace Database\Seeders;

use App\Models\GameMatch;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GameMatchSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $matches = 
        [
            ['title' => 'MYANMAR vs TIMOR LESTE', 'start_time' => '16:00', 'event_id' => 1],
        ];
        foreach($matches as $match)
        {
            GameMatch::create($match);
        }
    }
}
