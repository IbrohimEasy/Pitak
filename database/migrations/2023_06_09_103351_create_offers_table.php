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
        Schema::create('yy_offers', function (Blueprint $table) {
            $table->id();
            $table->integer('driver_id')->nullable(); 
            $table->integer('client_id')->nullable(); 
            $table->integer('order_id')->nullable(); 
            $table->integer('order_detail_id')->nullable(); 
            $table->double('price')->nullable();
            $table->smallInteger('status')->nullable();
            $table->text('comment')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::table('yy_offers', function (Blueprint $table) {
            $table->foreign('driver_id')->references('id')->on('yy_drivers');
            $table->foreign('client_id')->references('id')->on('yy_clients');
            $table->foreign('order_id')->references('id')->on('yy_orders');
            $table->foreign('order_detail_id')->references('id')->on('yy_order_details');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('yy_offers');
    }
};
