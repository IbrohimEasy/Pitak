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
        Schema::create('yy_order_details', function (Blueprint $table) {
            $table->id();
            $table->integer('order_id')->nullable();
            $table->integer('status_id')->nullable();
            $table->integer('client_id')->nullable();
            $table->integer('company_id')->nullable();
            $table->smallInteger('seats_type')->nullable();
            $table->integer('seats_count')->nullable();
            $table->integer('from_id')->nullable();
            $table->integer('to_id')->nullable();
            $table->text('comment')->nullable();
            $table->double('price')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('yy_order_details');
    }
};
