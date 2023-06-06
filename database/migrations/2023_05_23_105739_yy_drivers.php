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
        Schema::create('yy_drivers', function (Blueprint $table) {
            $table->id();
            $table->integer('personal_info_id')->nullable();
            $table->integer('status_id')->nullable();
            $table->integer('company_id')->nullable();
            $table->string('serial_number')->nullable();
            $table->string('issued_by')->nullable();
            $table->string('passport_image')->nullable();
            $table->timestamp('passport_expired_date')->nullable();
            $table->string('license_number')->nullable();
            $table->timestamp('license_expired_date')->nullable();
            $table->string('license_image')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('yy_drivers');
    }
};
