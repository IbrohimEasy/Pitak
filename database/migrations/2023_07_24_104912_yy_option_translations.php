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
         Schema::create('yy_option_translations', function (Blueprint $table) {
            $table->id();
            $table->string('lang')->nullable();
            $table->integer('option_id')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('option_id')->references('id')->on('yy_options')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('yy_option_translations');
    }
};
