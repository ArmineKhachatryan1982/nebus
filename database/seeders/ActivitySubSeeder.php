<?php

namespace Database\Seeders;

use App\Models\Activity;
use App\Models\Activity_sub;
use App\Models\ActivitySub;
use Database\Factories\ActivitySubFactory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ActivitySubSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Activity::all()->each(function ($activity) {
        ActivitySub::factory()
            ->count(rand(2, 3))
            ->create([
                'activity_id' => $activity->id,
            ]);
        });
    }
}
