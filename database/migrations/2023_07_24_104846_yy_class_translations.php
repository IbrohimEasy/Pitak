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
        Schema::create('yy_class_translations', function (Blueprint $table) {
            $table->id();
            $table->string('lang')->nullable();
            $table->integer('class_list_id')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('class_list_id')->references('id')->on('yy_class_lists')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('yy_class_translations');
    }
};
