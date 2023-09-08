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
        Schema::create('vehicle_journeys', function (Blueprint $table) {
            $table->string('private_code')->unique()->primary();
            $table->integer('ticket_machine_service_code');
            $table->integer('jouney_code');
            $table->string('layover_point');
            $table->string('duration');
            $table->decimal('latitude', 10, 8);
            $table->decimal('longitude', 11, 8);
            $table->string('garage_reference');
            $table->foreign('garage_reference')->references('garage_code')->on('garages');
            $table->string('service_code_reference');
            $table->foreign('service_code_reference')->references('service_code')->on('services');
            $table->time('departure_time');
            $table->index('garage_reference');
            $table->index('service_code_reference');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vehicle_journeys');
    }
};
