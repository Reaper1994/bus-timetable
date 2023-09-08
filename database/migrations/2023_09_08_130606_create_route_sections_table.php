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
        Schema::create('route_sections', function (Blueprint $table) {
            $table->string('route_section_id')->unique()->primary();
            $table->string('from_stop_point_reference');
            $table->string('to_stop_point_reference');
            $table->foreign('from_stop_point_reference')->references('atco_code')->on('stops');
            $table->foreign('to_stop_point_reference')->references('atco_code')->on('stops');
            $table->index('from_stop_point_reference'); // Index for from_stop_point_reference
            $table->index('to_stop_point_reference');  // Index for to_stop_point_reference
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('route_stops');
    }
};
