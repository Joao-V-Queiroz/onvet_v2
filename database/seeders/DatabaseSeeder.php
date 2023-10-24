<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
	public function run(): void
	{
		User::create([
			'name' => 'Mr. Admin',
			'email' => 'admin@admin.com',
			'email_verified_at' => now(),
			'password' => bcrypt('12345'),
		]);

		$this->call([
           FazendaSeeder::class,
           TanqueSeeder::class,
		]);
	}
}