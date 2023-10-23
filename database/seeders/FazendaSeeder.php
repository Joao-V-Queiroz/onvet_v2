<?php

namespace Database\Seeders;

use App\Models\Fazenda;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FazendaSeeder extends Seeder
{
    public function run(): void
    {
        Fazenda::factory()->count(5)->create();
    }
}
