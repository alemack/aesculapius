<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class SpecializationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $specializations = [
            ['name'=>'Стоматолог-терапевт'],
            ['name'=>'Стоматолог-ортодонт'],
            ['name'=>'Стоматолог-пародонтолог'],
            ['name'=>'Стоматолог-ортопед'],
            ['name'=>'Стоматолог-хирург'],
            ['name'=>'Стоматолог-гигиенист'],
            ['name'=>'Имплантолог'],
            ['name'=>'Челюстно-лицевой хирург'],
            ['name'=>'Детский стоматолог'],
        ];

        DB::table('specializations')->insert($specializations);
    }
}
