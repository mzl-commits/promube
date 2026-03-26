<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::updateOrCreate(
            ['email' => 'admin@promube.com'],
            [
                'name' => 'Administrador',
                'password' => bcrypt('password123'),
                'is_admin' => true,
                'email_verified_at' => now(),
            ]
        );
        $this->call([
            BecaSeeder::class,
        ]);
    }

}
