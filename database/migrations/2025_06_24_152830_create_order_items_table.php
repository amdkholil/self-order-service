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
        Schema::create('order_items', function (Blueprint $table) {
            $table->id();
            $table->foreignId('order_id')->index();
            $table->foreignId('menu_id')->index();
            $table->string('menu_name');
            $table->integer('quantity');
            $table->integer('price');
            $table->string('note')->nullable();
            $table->bigInteger('option_id')->nullable()->index();
            $table->string('option_name')->nullable();
            $table->bigInteger('option_value_id')->nullable();
            $table->string('option_value_value')->nullable();
            $table->integer('option_value_price')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('order_items');
    }
};
