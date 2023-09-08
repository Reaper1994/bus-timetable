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
        Schema::create('journey_patterns', function (Blueprint $table) {
            $table->string('journey_pattern_id')->unique()->primary();
            $table->string('service_code_reference');
            $table->foreign('service_code_reference')->references('service_code')->on('services');
            $table->string('destination');
            $table->string('direction');
            $table->string('route_reference');
            $table->foreign('route_reference')->references('route_id')->on('routes');
            $table->index('route_reference');
            $table->index('service_code_reference');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('journey_patterns');
    }
};
