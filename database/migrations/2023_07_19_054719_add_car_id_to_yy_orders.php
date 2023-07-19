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
        Schema::table('yy_orders', function (Blueprint $table) {
            // Remove the old column
            $table->dropColumn('cars_list_id');
            
            // Add the new column
            $table->integer('car_id')->nullable();

        });
        
        // Add index for the foreign key
        Schema::table('yy_orders', function (Blueprint $table) {
            $table->foreign('car_id')->references('id')->on('yy_cars');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('yy_orders', function (Blueprint $table) {
            // Add the new column
            $table->integer('cars_list_id');

            // Remove the old column
            $table->dropColumn('car_id');
        });
    }
};
