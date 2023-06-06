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
        Schema::create('yy_user_verifies', function (Blueprint $table) {
            $table->id();
            $table->integer('status_id');
            $table->string('phone_number');
            $table->string('verify_code')->nullable();
            $table->timestamp('verify_date')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('yy_user_verifies');
    }
};
