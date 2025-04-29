<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('travel_policies', function (Blueprint $table) {
            $table->id();
            // Personal Details
            $table->string('full_name');
            $table->string('email');
            $table->string('phone_number');
            $table->string('department');
            $table->string('position');
            
            // Travel Details
            $table->string('destination');
            $table->date('departure_date');
            $table->date('return_date');
            $table->text('purpose_of_travel');
            $table->decimal('estimated_cost', 10, 2);
            $table->enum('status', ['draft', 'posted', 'cancelled'])->default('draft');
            
            // Document Details
            $table->string('document_number')->unique()->nullable();
            $table->timestamp('posted_at')->nullable();
            
            // Soft Delete and Timestamps
            $table->softDeletes();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('travel_policies');
    }
}; 