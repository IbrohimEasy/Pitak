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
        Schema::create('yy_clients', function (Blueprint $table) {
            $table->id();
            $table->integer('personal_info_id')->nullable();
            $table->integer('status_id')->nullable();
            $table->integer('company_id')->nullable();
            $table->timestamps();
            $table->softDeletes();
            // $table->foreign('personal_info_id')->references('id')->on('personal_info')
            //     ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('yy_clients');
    }
};
