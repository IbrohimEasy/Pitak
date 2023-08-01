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
       Schema::create('yy_status_translations', function (Blueprint $table) {
            $table->id();
            $table->string('lang')->nullable();
            $table->integer('status_id')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('status_id')->references('id')->on('yy_statuses')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
       Schema::dropIfExists('yy_status_translations');
    }
};
