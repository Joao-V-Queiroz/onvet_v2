<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Tanque;

class TanqueSeeder extends Seeder
{
    public function run(): void
    {
        Tanque::factory()->count(10)->create();
    }
}