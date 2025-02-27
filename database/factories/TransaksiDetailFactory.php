<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\TransaksiDetail;
use App\Models\Transaksi;
use App\Models\Layanan;

class TransaksiDetailFactory extends Factory
{
    protected $model = TransaksiDetail::class;

    public function definition(): array
    {
        $hargaSatuan = $this->faker->randomFloat(2, 5000, 100000);
        $jumlah = $this->faker->numberBetween(1, 10);
        return [
            'transaksi_id' => Transaksi::factory(),
            'id_layanan' => Layanan::factory(),
            'jumlah' => $jumlah,
            'harga_satuan' => $hargaSatuan,
            'total_harga' => $jumlah * $hargaSatuan,
        ];
    }
}
