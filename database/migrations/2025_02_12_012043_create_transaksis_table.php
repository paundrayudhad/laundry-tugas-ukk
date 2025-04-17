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
<<<<<<< HEAD
=======
            $table->date('tanggal_diambil')->nullable();
>>>>>>> eadfbc5 (dsfs)
            
            $table->unsignedBigInteger('cabang_id');
            $table->foreign('cabang_id')->references('id')->on('cabangs')->onDelete('cascade');
            
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });

        Schema::create('transaksi_details', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('transaksi_id');
            $table->foreign('transaksi_id')->references('id')->on('transaksi')->onDelete('cascade');
            
            $table->unsignedBigInteger('id_layanan');
            $table->foreign('id_layanan')->references('id')->on('layanan')->onDelete('cascade');
            
            $table->integer('jumlah');
            $table->double('harga_satuan');
            $table->double('total_harga');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transaksi_details');
        Schema::dropIfExists('transaksi');
    }
};
