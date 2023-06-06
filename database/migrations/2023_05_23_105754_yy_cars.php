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
        Schema::create('yy_cars', function (Blueprint $table) {
            $table->id();
            $table->integer('car_list_id')->nullable();
            $table->integer('driver_id')->nullable();
            $table->integer('status_id')->nullable();
            $table->integer('color_list_id')->nullable();
            $table->integer('class_list_id')->nullable();
            $table->string('reg_certificate')->nullable();
            $table->string('reg_certificate_image')->nullable();
            $table->json('images')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('yy_cars');
    }
};
