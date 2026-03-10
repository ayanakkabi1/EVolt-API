<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Station extends Model
{
    protected $fillable = ['name', 'location', 'status'];

    /**
     * Get reservations for this station.
     */
    public function reservations(): HasMany
    {
        return $this->hasMany(Reservation::class);
    }
}
