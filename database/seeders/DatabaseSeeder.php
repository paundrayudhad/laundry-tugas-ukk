<?php

namespace Database\Seeders;

use App\Models\User;
use Database\Factories\TransaksiFactory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\Transaksi;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory()->count(10)->create(); // Buat 10 transaksi
    }
}
