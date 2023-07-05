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
        Schema::table('yy_user_verifies', function (Blueprint $table) {
            $table->foreign('status_id')->references('id')->on('yy_statuses');
            // $table->foreign('user_id')->references('id')->on('yy_statuses');
        });

        Schema::table('yy_staffs', function (Blueprint $table) {
            $table->foreign('role_id')->references('id')->on('yy_roles');
            $table->foreign('company_id')->references('id')->on('yy_companies');
            $table->foreign('personal_info_id')->references('id')->on('yy_personal_infos');
        });    

        Schema::table('yy_companies', function (Blueprint $table) {
            $table->foreign('status_id')->references('id')->on('yy_statuses');
        });

        Schema::table('yy_drivers', function (Blueprint $table) {
            // $table->foreign('personal_info_id')->references('id')->on('yy_personal_infos');
            $table->foreign('status_id')->references('id')->on('yy_statuses');
            $table->foreign('user_id')->references('id')->on('yy_users');
            // $table->foreign('company_id')->references('id')->on('yy_companies');
        });

        Schema::table('yy_cars', function (Blueprint $table) {
            $table->foreign('car_list_id')->references('id')->on('yy_car_lists');
            $table->foreign('driver_id')->references('id')->on('yy_drivers');
            $table->foreign('status_id')->references('id')->on('yy_statuses');
            $table->foreign('color_list_id')->references('id')->on('yy_color_lists');
            $table->foreign('class_list_id')->references('id')->on('yy_class_lists');
        });

        Schema::table('yy_car_lists', function (Blueprint $table) {
            $table->foreign('status_id')->references('id')->on('yy_statuses');
            $table->foreign('car_type_id')->references('id')->on('yy_car_types');
        });
        
        // Schema::table('yy_clients', function (Blueprint $table) {
        //     $table->foreign('personal_info_id')->references('id')->on('yy_personal_infos');
        //     $table->foreign('status_id')->references('id')->on('yy_statuses');
        //     $table->foreign('company_id')->references('id')->on('yy_companies');
        // });

        Schema::table('yy_class_lists', function (Blueprint $table) {
            $table->foreign('status_id')->references('id')->on('yy_statuses');
        });

        Schema::table('yy_roles', function (Blueprint $table) {
            $table->foreign('status_id')->references('id')->on('yy_statuses');
        });

        Schema::table('yy_car_types', function (Blueprint $table) {
            $table->foreign('status_id')->references('id')->on('yy_statuses');
        });

        Schema::table('yy_orders', function (Blueprint $table) {
            $table->foreign('status_id')->references('id')->on('yy_statuses');
            $table->foreign('driver_id')->references('id')->on('yy_users');
            $table->foreign('cars_list_id')->references('id')->on('yy_car_lists');
            $table->foreign('company_id')->references('id')->on('yy_companies');
        });

        Schema::table('yy_order_details', function (Blueprint $table) {
            $table->foreign('order_id')->references('id')->on('yy_orders');
            $table->foreign('status_id')->references('id')->on('yy_statuses');
            $table->foreign('client_id')->references('id')->on('yy_users');
            $table->foreign('company_id')->references('id')->on('yy_companies');
        });

        Schema::table('yy_language_translations', function (Blueprint $table) {
            $table->foreign('language_id')->references('id')->on('yy_languages');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
