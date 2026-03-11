<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('reservations', function (Blueprint $table) {
            $table->dropConstrainedForeignId('station_id');
            $table->foreignId('charging_station_id')->after('user_id')->constrained('charging_stations')->cascadeOnDelete();
        });

        Schema::dropIfExists('stations');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::create('stations', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('location');
            $table->string('status')->default('available');
            $table->timestamps();
        });

        Schema::table('reservations', function (Blueprint $table) {
            $table->dropConstrainedForeignId('charging_station_id');
            $table->foreignId('station_id')->after('user_id')->constrained('stations')->cascadeOnDelete();
        });
    }
};
