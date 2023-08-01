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
        Schema::create('yy_users', function (Blueprint $table) {
            $table->id();
            $table->integer('personal_info_id')->nullable();
            $table->string('token')->unique()->nullable();
            $table->integer('company_id')->nullable();
            $table->integer('balance')->nullable();
            $table->integer('personal_account')->nullable()->unique();
            $table->integer('type')->nullable();
            $table->text('about_me')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('yy_users');
    }
};
