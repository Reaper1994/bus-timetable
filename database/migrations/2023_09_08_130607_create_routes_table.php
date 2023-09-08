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
        Schema::create('routes', function (Blueprint $table) {
            $table->string('route_id')->unique()->primary();
            $table->text('route_description')->nullable();
            $table->string('route_section_reference');
            $table->foreign('route_section_reference')->references('route_section_id')->on('route_sections');
            $table->index('route_section_reference'); // Index for route_section_reference
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('routes');
    }
};
