<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('coverage_benefits', function (Blueprint $table) {
            $table->id();
            $table->foreignId('coverage_id')->constrained()->onDelete('cascade');
            $table->foreignId('benefit_id')->constrained()->onDelete('cascade');
            $table->unique(['coverage_id', 'benefit_id']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('coverage_benefits');
    }
}; 