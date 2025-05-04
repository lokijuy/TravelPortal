<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('policy_issuances', function (Blueprint $table) {
            $table->id();
            
            // Personal Information
            $table->string('full_name');
            $table->string('email');
            $table->string('contact_number');
            $table->string('address1');
            $table->string('address2')->nullable();
            $table->string('source_of_fund');
            $table->string('gender');
            $table->string('nationality');
            $table->date('birth_date');
            
            // Government ID Information
            $table->string('govt_id_type');
            $table->string('govt_id_number');
            $table->string('govt_id_image');
            
            // Beneficiary Information
            $table->string('beneficiary_name');
            $table->string('beneficiary_contact');
            $table->string('beneficiary_relationship');
            
            // Policy Details
            $table->string('policy_number');
            $table->string('origin');
            $table->string('destination');
            $table->date('effective_date');
            $table->date('expiry_date');
            
            // Document Information
            $table->string('document_number')->unique();
            $table->enum('status', ['draft', 'posted', 'cancelled'])->default('draft');
            
            // System Fields
            $table->timestamp('posted_at')->nullable();
            $table->softDeletes('deleted_at');
            $table->boolean('disclaimer')->default(false);
            $table->foreignId('user_id')->constrained();
            $table->foreignId('product_id')->constrained();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('policy_issuances');
    }
}; 