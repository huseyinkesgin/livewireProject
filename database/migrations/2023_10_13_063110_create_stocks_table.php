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
        Schema::create('stocks', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->foreignId('section_id');
            $table->foreignId('brand_id');
            $table->foreignId('unit_id');
            $table->string('stock_code')->unique();
            $table->string('barcode')->unique();
            $table->string('tax');
            $table->boolean('isActive')->default(true);
            $table->boolean('isDeleted')->default(false);
            $table->text('note')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('stocks');
    }
};
