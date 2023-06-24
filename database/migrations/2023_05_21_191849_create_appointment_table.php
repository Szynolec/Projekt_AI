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
        Schema::create('appointment', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('id_product')->nullable(false);;
            $table->unsignedInteger('id_user')->nullable(false);;
            $table->date('date')->nullable(false);;
            $table->string('hour', 10)->nullable(false);
            $table->foreign('id_product')->references('id')->on('products');
            $table->foreign('id_user')->references('id')->on('users');
        });
    }

    /**
     * Cofnij migracje.
     */
    public function down(): void
    {
        Schema::dropIfExists('appointment');
    }
};
