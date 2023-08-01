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
        Schema::table('yy_personal_infos', function (Blueprint $table) {
            $table->string('passport_serial_number')->nullable();
            $table->json('passport_images')->nullable();
            $table->date('passport_issued_by')->nullable();
            $table->date('passport_expired_date')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('yy_personal_infos', function (Blueprint $table) {
            $table->dropColumn('passport_serial_number');
            $table->dropColumn('passport_images');
            $table->dropColumn('passport_issued_by');
            $table->dropColumn('passport_expired_date');
        });
    }
};
