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
        Schema::create('yy_role_translations', function (Blueprint $table) {
            $table->id();
            $table->string('lang')->nullable();
            $table->integer('role_id')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('role_id')->references('id')->on('yy_roles')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('yy_role_translations');
    }
};
