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
        Schema::create('yy_cities', function (Blueprint $table) {
            $table->id();
            $table->string('name'); 
            $table->integer('country_id'); 
            $table->string('type'); 
            $table->integer('parent_id'); 
            $table->double('distance'); 
            $table->double('inside_price'); 
            $table->integer('has_express'); 
            $table->integer('is_selected'); 
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::table('yy_cities', function (Blueprint $table) {
            $table->foreign('country_id')->references('id')->on('yy_countries');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('yy_cities');
    }
};
