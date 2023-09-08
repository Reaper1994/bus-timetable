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
        Schema::create('journey_pattern_sections', function (Blueprint $table) {
            $table->id();
            $table->integer('sequence_number');
            $table->string('from_activity')->nullable();
            $table->string('from_dynamic_destination_display');
            $table->string('from_stop_point_reference');
            $table->foreign('from_stop_point_reference')->references('atco_code')->on('stops');
            $table->string('from_timing_status')->nullable();
            $table->string('to_activity')->nullable();
            $table->string('to_dynamic_destination_display');
            $table->string('to_stop_point_reference');
            $table->foreign('to_stop_point_reference')->references('atco_code')->on('stops');
            $table->string('to_timing_status')->nullable();
            $table->index('to_stop_point_reference'); // Index for to_stop_point_reference
            $table->index('from_stop_point_reference'); // Index for from_stop_point_reference

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('journey_pattern_sections');
    }
};
