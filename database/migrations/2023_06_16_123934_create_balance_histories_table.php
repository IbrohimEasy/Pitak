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
        Schema::create('yy_balance_histories', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->smallInteger('type'); // 0 - client, 1 - driver
            $table->double('price')->nullable();
            $table->integer('transaction_id')->nullable();
            $table->integer('price_type')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::table('yy_drivers', function (Blueprint $table) {
            $table->integer('personal_account')->nullable();
            $table->double('balance')->default(0);
        });
        
        Schema::table('yy_clients', function (Blueprint $table) {
            $table->integer('personal_account')->nullable();
            $table->double('balance')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('yy_balance_histories');
    }
};
