<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ChargingSession extends Model
{
    protected $fillable = ['user_id', 'charging_station_id', 'reservation_id', 'start_time', 'end_time', 'energy_consumed'];

    /**
     * Get the user associated with this charging session.
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the charging station associated with this charging session.
     */
    public function chargingStation(): BelongsTo
    {
        return $this->belongsTo(ChargingStation::class);
    }

    /**
     * Get the reservation associated with this charging session.
     */
    public function reservation(): BelongsTo
    {
        return $this->belongsTo(Reservation::class);
    }
}
