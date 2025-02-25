<?php

namespace Database\Factories;

use App\Models\Transaksi;
use App\Models\Layanan;
use App\Models\Cabang;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Transaksi>
 */
class TransaksiFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Transaksi::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        return [
            'id_layanan' => Layanan::factory(),
            'nama_penerima' => $this->faker->name(),
            'alamat' => $this->faker->address(),
            'jumlah' => $this->faker->numberBetween(1, 10),
            'total_harga' => $this->faker->randomFloat(2, 10000, 1000000),
            'status' => $this->faker->randomElement(['pending', 'proses', 'selesai']),
            'cabang_id' => Cabang::factory(),
            'user_id' => User::factory(),
        ];
    }
}
