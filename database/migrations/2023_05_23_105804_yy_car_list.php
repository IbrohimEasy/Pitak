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
        Schema::create('yy_car_lists', function (Blueprint $table) {
            $table->id();
            $table->integer('status_id')->nullable();
            $table->integer('car_type_id')->nullable();
            $table->integer('name')->nullable();
            $table->timestamps();
            $table->softDeletes();
            // $table->foreign('model_id')->references('id')->on('model')
            //     ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('yy_car_lists');
    }
};
