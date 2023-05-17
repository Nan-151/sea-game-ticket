<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
class Event extends Model
{
    use HasFactory;
    protected $fillable = 
    [
        'title',
        'date',
        'venue_id',
        'category_id',
    ];

    public function venue(): HasMany
    {
        # code...
        return $this->hasMany(Venue::class);
    }
    public function ticket(): HasMany
    {
        # code...
        return $this->hasMany(Ticket::class);
    }
    public function sport(): HasMany
    {
        # code...
        return $this->hasMany(Sport::class);
    }
}
