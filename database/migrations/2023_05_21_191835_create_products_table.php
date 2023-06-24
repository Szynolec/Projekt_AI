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
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->string('type',30)->nullable(false);
            $table->string('img', 30)->nullable(false);
            $table->text('des')->nullable(false);
            $table->decimal('cost', 10, 2)->nullable(false);
        });
    }

    /**
     * Cofnij migracje.
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
};
