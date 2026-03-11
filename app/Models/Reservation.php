<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Reservation extends Model
{
    protected $fillable = ['user_id', 'charging_station_id', 'start_time', 'duration', 'status'];

    /**
     * Get the user associated with this reservation.
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the charging station associated with this reservation.
     */
    public function chargingStation(): BelongsTo
    {
        return $this->belongsTo(ChargingStation::class);
    }

    /**
     * Get the charging sessions for this reservation.
     */
    public function chargingSessions(): HasMany
    {
        return $this->hasMany(ChargingSession::class);
    }
}
