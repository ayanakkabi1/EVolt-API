<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ChargingStation extends Model
{
    protected $fillable = ['name', 'location', 'latitude', 'longitude', 'connector_type', 'is_available'];

    /**
     * Get the charging sessions for this station.
     */
    public function chargingSessions(): HasMany
    {
        return $this->hasMany(ChargingSession::class);
    }
}
