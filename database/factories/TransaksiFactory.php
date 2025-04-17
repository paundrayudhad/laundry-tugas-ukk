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
            'nama_penerima' => $this->faker->name(),
            'alamat' => $this->faker->address(),
<<<<<<< HEAD
            'total_harga' => $this->faker->randomFloat(2, 10000, 500000),
            'status' => $this->faker->randomElement(['pending', 'proses', 'selesai']),
            'cabang_id' => 1,
            'user_id' => User::factory(),
=======
            'total_harga' => $this->faker->randomFloat(2, 2000, 8000),
            'status' => $this->faker->randomElement(['pending', 'proses', 'selesai']),
            'cabang_id' => $this->faker->numberBetween(1,2),
            'user_id' => 4,
>>>>>>> eadfbc5 (dsfs)
        ];
    }
}
