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
        Schema::create('parametrization', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->float('min_value');
            $table->float('max_value');
            $table->float('min_points');
            $table->float('max_points');
            $table->foreignId('indicator_id')->constrained('indicator')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('parametrization');
    }
};
