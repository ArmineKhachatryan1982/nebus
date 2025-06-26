<?php

namespace App\Http\Controllers;

use App\Models\Building;
use Illuminate\Http\Request;

class OrganizationController extends Controller
{
    public function organizationsByBuilding(Building $building)
    {
         // Загружаем организации, связанные со зданием
        $organizations = $building->organizations()->get();

        return response()->json([
            'building_id' => $building->id,
            'organizations' => $organizations,
        ]);
    }
}
