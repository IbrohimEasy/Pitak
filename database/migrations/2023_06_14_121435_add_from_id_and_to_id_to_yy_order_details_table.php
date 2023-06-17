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
        Schema::table('yy_order_details', function (Blueprint $table) {
            $table->integer('from_id')->nullable();
            $table->integer('to_id')->nullable();
            $table->text('comment')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('yy_order_details', function (Blueprint $table) {
            $table->dropColumn('from_id');
            $table->dropColumn('to_id');
            $table->dropColumn('comment');
        });
    }
};
