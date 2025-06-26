<?php

namespace Database\Seeders;

use App\Models\Building;
use App\Models\Organization;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class OrganizationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         // Создаем 10 зданий
        // $buildings = Building::all();

        // // Для каждого здания создаем организацию с ссылкой на это здание
        // foreach ($buildings as $building) {
        //     Organization::factory()->create([
        //         'building_id' => $building->id,
        //     ]);
        // }
        Organization::factory()->count(10)->create();
    }
}
