<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Wykonaj migracje.
     */
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('email', 40)->nullable(false);;
            $table->string('password')->nullable(false);;
            $table->string('name', 30)->nullable(false);;
            $table->string('last_name', 30)->nullable(false);;
            $table->string('phone_number', 20)->nullable(false);;
            $table->string('address', 50)->nullable(false);;
            $table->string('role', 30)->nullable(false);
        });
    }

    /**
     * Cofnij migracje.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
