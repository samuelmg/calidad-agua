<?php

namespace Database\Seeders;

use App\Models\Reporte;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ReporteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Reporte::create([
            'user_id' => 1,
            'ubicacion' => 'Casa x',
            'descripcion' => 'bla bla',
            'fecha_inicio' => '2026-05-05',
        ]);
        Reporte::create([
            'user_id' => 1,
            'ubicacion' => 'Casa Y',
            'descripcion' => 'bla bla fjdsaklñfjas',
            'fecha_inicio' => '2026-05-05',
        ]);

        DB::table('reportes')->insert([
            'user_id' => 1,
            'ubicacion' => 'Casa Z',
            'descripcion' => 'creado con DB',
            'fecha_inicio' => '2026-05-05',
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
