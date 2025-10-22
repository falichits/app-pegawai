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
    Schema::create('pegawais', function (Blueprint $table) {
        $table->id();
        $table->string('nama', 100);
        $table->string('nip', 30)->unique();
        $table->string('jabatan', 50);
        $table->string('departemen', 50);
        $table->date('tanggal_masuk');
        $table->decimal('gaji', 12, 2);
        $table->timestamps();
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pegawais');
    }
};
