<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('code')->unique();
            $table->foreignId('program_id')->constrained()->onDelete('cascade');
            $table->decimal('gross', 12, 2);
            $table->decimal('net', 12, 2);
            $table->decimal('premium_tax', 12, 2);
            $table->decimal('lgt', 12, 2);
            $table->decimal('doc_stamp', 12, 2);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::dropIfExists('products');
    }
}; 