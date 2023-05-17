<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Venue extends Model
{
    use HasFactory;
    protected $fillable =
    [
        'name'
    ];
    public function event(): BelongsTo
    {
        # code...
        return $this->belongsTo(Event::class);
    }
    public function zone(): HasMany
    {
        # code...
        return $this->hasMany(Zone::class);
    }


}
