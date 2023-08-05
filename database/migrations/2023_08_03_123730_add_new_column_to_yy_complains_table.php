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
        Schema::table('yy_complains', function (Blueprint $table) {
            $table->tinyInteger('type')->nullable();
            $table->integer('order_detail_id')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('yy_complains', function (Blueprint $table) {
            //
        });
    }
};
