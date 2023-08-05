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
            $table->dropColumn('driver_id');
        });

        Schema::table('yy_orders', function (Blueprint $table) {
            $table->integer('driver_id')->nullable();
        });
        
        Schema::table('yy_orders', function (Blueprint $table) {
            $table->foreign('driver_id')->references('id')->on('yy_users');
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
