<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('pegawais', function (Blueprint $table) {
            $table->foreignId('jabatan_id')->constrained('positions')->onDelete('cascade');
            $table->foreignId('departemen_id')->constrained('departments')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::table('pegawais', function (Blueprint $table) {
            $table->dropForeign(['jabatan_id']);
            $table->dropForeign(['departemen_id']);
            $table->dropColumn(['jabatan_id', 'departemen_id']);
        });
    }
};
