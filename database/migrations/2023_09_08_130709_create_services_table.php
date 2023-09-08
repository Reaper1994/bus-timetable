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
        Schema::create('services', function (Blueprint $table) {
            $table->string('service_code')->unique()->primary();
            $table->string('operating_start_day')->nullable();
            $table->string('opearting_end_day')->nullable();
            $table->string('operator_reference');
            $table->foreign('operator_reference')->references('operator_code')->on('operators');
            $table->index('operator_reference');
            $table->string('mode');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('services');
    }
};
