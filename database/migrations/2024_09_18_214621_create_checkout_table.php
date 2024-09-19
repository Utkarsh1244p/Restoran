<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('checkout', function (Blueprint $table) {
            $table->id(); // Primary key
            $table->string('name');
            $table->string('email');
            $table->string('town');
            $table->string('country');
            $table->string('zipcode');
            $table->string('phone');
            $table->text('address');
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade'); // Foreign key to 'users' table
            $table->decimal('price', 10, 2); // For storing prices
            $table->enum('status', ['pending', 'completed', 'cancelled'])->default('pending');
            $table->timestamps(); // Adds created_at and updated_at columns
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('checkout');
    }
};
