<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
class Zone extends Model
{
    use HasFactory;
    protected $fillable =
    [
        'name',
        'number_of_seat',
        'venue_id'
    ];

    public function venue(): BelongsTo
    {
        # code...
        return $this->belongsTo(Venue::class);
    }
}
