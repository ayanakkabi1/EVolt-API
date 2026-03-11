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
        Schema::table('charging_stations', function (Blueprint $table) {
            $table->decimal('power_kw', 8, 2)->default(0)->after('connector_type');
            $table->decimal('price_per_kwh', 8, 2)->nullable()->after('power_kw');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('charging_stations', function (Blueprint $table) {
            $table->dropColumn(['power_kw', 'price_per_kwh']);
        });
    }
};
