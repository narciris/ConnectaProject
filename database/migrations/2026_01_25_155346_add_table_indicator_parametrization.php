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
        Schema::create('indicator_parametrization', function (Blueprint $table) {
            $table->id();
            $table->foreignId('indicator_id')->constrained('indicator')->onDelete('cascade');
            $table->foreignId('parametrization_id')->constrained('parametrization')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('indicator_parametrization');
    }
};
