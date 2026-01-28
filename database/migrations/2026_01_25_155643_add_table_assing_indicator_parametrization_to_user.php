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
        Schema::create('assign_indicator_user', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->foreignId('indicator_id')->constrained('indicator')->onDelete('cascade');
            $table->foreignId('parametrization_id')->constrained('parametrization')->onDelete('cascade');

            $table->unique(['user_id','parametrization_id','indicator_id'],'assign_user_param_indicator_unique');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('assign_indicator_user');
    }
};
