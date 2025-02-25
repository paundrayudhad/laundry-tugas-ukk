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
        Schema::create('transaksi', function (Blueprint $table) {
            $table->id();
            $table->string('nama_penerima');
            $table->text('alamat');
            $table->double('total_harga');
            $table->enum('status', ['pending', 'proses', 'selesai']);
            $table->timestamps();
            
            $table->unsignedBigInteger('cabang_id');
            $table->foreign('cabang_id')->references('id')->on('cabangs')->onDelete('cascade');
            
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            
            $table->json('layanan_details'); // Menyimpan layanan dalam format JSON
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transaksi');
    }
};
