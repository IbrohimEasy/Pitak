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
            $table->dropColumn('price');
            $table->dropColumn('price_type');
            $table->dropColumn('title');
            $table->dropColumn('start_date');
            $table->dropColumn('seats');
            
            // $table->double('price')->nullable();
            // $table->smallInteger('price_type')->nullable();
            // $table->string('title')->nullable();
            // $table->timestamp('start_date')->nullable();
            // $table->json('seats')->nullable();
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
