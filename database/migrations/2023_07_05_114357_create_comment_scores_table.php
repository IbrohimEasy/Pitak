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
        Schema::create('yy_comment_scores', function (Blueprint $table) {
            $table->id();
            $table->integer('client_id');
            $table->integer('driver_id');
            $table->integer('order_id');
            $table->integer('type')->nullable();
            $table->timestamp('date')->nullable();
            $table->text('text')->nullable();
            $table->smallInteger('score')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::table('yy_comment_scores', function (Blueprint $table) {
            $table->foreign('client_id')->references('id')->on('yy_users');
            $table->foreign('driver_id')->references('id')->on('yy_users');
            $table->foreign('order_id')->references('id')->on('yy_orders');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('yy_comment_scores');
    }
};
