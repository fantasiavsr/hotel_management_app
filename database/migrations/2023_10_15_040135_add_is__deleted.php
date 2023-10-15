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
        /* add isDeleted on users table */
        Schema::table('users', function (Blueprint $table) {
            $table->Integer('isDeleted')->default('0');
        });

        /* add isDeleted on transaksis table */
        Schema::table('transaksis', function (Blueprint $table) {
            $table->Integer('isDeleted')->default('0');
        });

        /* add isDeleted on ruangans table */
        Schema::table('ruangans', function (Blueprint $table) {
            $table->Integer('isDeleted')->default('0');
        });

        /* add isDeleted on pelanggans table */
        Schema::table('pelanggans', function (Blueprint $table) {
            $table->Integer('isDeleted')->default('0');
        });

        /* add isDeleted on bookings table */
        Schema::table('bookings', function (Blueprint $table) {
            $table->Integer('isDeleted')->default('0');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        /* drop isDeleted on users table */
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('isDeleted');
        });

        /* drop isDeleted on transaksis table */
        Schema::table('transaksis', function (Blueprint $table) {
            $table->dropColumn('isDeleted');
        });

        /* drop isDeleted on ruangans table */
        Schema::table('ruangans', function (Blueprint $table) {
            $table->dropColumn('isDeleted');
        });

        /* drop isDeleted on pelanggans table */
        Schema::table('pelanggans', function (Blueprint $table) {
            $table->dropColumn('isDeleted');
        });

        /* drop isDeleted on bookings table */
        Schema::table('bookings', function (Blueprint $table) {
            $table->dropColumn('isDeleted');
        });
    }
};
