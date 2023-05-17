<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GameMatch extends Model
{
    use HasFactory;
    protected $fillable =
    [
        'title',
        'start_time',
        'event_id',
        
    ];
}
