<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('product_coverages', function (Blueprint $table) {
            $table->id();
            $table->foreignId('product_id')->constrained()->onDelete('cascade');
            $table->foreignId('coverage_id')->constrained()->onDelete('cascade');
            $table->unique(['product_id', 'coverage_id']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('product_coverages');
    }
}; 