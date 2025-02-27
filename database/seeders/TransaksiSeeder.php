<?php

namespace Database\Seeders;

use App\Models\Transaksi;
use App\Models\TransaksiDetail;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TransaksiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        Transaksi::factory()
            ->count(10) // Membuat 10 transaksi
            ->has(TransaksiDetail::factory()->count(3), 'details') // Setiap transaksi punya 3 detail
            ->create();
    }
}
