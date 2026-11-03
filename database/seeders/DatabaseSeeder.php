<?php

namespace Database\Seeders;

use App\Models\Reporte;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

        User::factory()
            ->has(Reporte::factory()->count(12))
            ->create([
                'name' => 'Samuel',
                'email' => 'samuel@demo.com',
            ]);

        $this->call([
            ReporteSeeder::class,
        ]);
    }
}
