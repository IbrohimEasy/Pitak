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
        Schema::create('yy_orders', function (Blueprint $table) {
            $table->id();
            $table->integer('status_id')->nullable();
            $table->integer('driver_id')->nullable();
            $table->integer('cars_list_id')->nullable();
            $table->integer('company_id')->nullable();
            $table->integer('from_id')->nullable();
            $table->integer('to_id')->nullable();
            $table->integer('price')->nullable();
            $table->integer('price_type')->nullable();
            $table->integer('title')->nullable();
            $table->integer('start_date')->nullable();
            $table->integer('seats')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('yy_orders');
    }
};
