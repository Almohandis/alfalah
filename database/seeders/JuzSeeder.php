<?php

namespace Database\Seeders;

use App\Models\Juz;
use Illuminate\Database\Seeder;

class JuzSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Juz::factory()
            ->count(30)
            ->create();
    }
}
