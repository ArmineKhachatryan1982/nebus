<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Organization;
use App\Models\Activity;
use Illuminate\Support\Facades\DB;

class OrganizationActivitySeeder extends Seeder
{
    public function run(): void
    {
        $organizationIds = Organization::pluck('id')->toArray();
        $activityIds = Activity::pluck('id')->toArray();

        foreach ($organizationIds as $orgId) {
            // Назначим 1–3 случайных активности для каждой организации
            $assignedActivities = collect($activityIds)
                ->shuffle()
                ->take(rand(1, 3))
                ->toArray();
                

            foreach ($assignedActivities as $activityId) {
                DB::table('organization_activities')->insert([
                    'organization_id' => $orgId,
                    'activity_id' => $activityId,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
        }
    }
}
