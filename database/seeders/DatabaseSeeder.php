<?php

namespace Database\Seeders;

use App\Models\ForoResults;
use App\Models\Profesional;
use App\Models\Register;
use App\Models\Results;
use App\Models\User;
use Database\Factories\ProfesionalFactory;
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


        Profesional::factory()->create();

        $registers = Register::factory()->count(50)->create();

        foreach ($registers as $register) {
            Results::factory()->for($register)->create();
            ForoResults::factory()->for($register)->create();
        }
    }
}
