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
            $table->dropForeign(['car_id']);
        });

        Schema::table('yy_orders', function (Blueprint $table) {
            $table->foreign('car_id')->references('id')->on('yy_car_lists');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
