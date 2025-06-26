<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MapController extends Controller
{
    public function organizationsInRadius(Request $request)
    {
        $latitude = $request->input('lat');    // например: 40.1811
    $longitude = $request->input('lng');   // например: 44.5136
    $radius = $request->input('radius', 10); // км, по умолчанию 10 км

    $organizations = DB::table('organizations')
        ->join('buildings', 'organizations.building_id', '=', 'buildings.id')
        ->select('organizations.*', 'buildings.latitude', 'buildings.longitude')
        ->whereRaw("
            (6371 * acos(
                cos(radians(?)) *
                cos(radians(buildings.latitude)) *
                cos(radians(buildings.longitude) - radians(?)) +
                sin(radians(?)) *
                sin(radians(buildings.latitude))
            )) < ?
        ", [$latitude, $longitude, $latitude, $radius])
        ->get();

       return response()->json($organizations);
    }
    public function organizationsInBox(Request $request){
        $minLat = $request->input('min_lat'); // например: 40.0
    $maxLat = $request->input('max_lat'); // например: 40.3
    $minLng = $request->input('min_lng'); // например: 44.3
    $maxLng = $request->input('max_lng'); // например: 44.7

    $organizations = DB::table('organizations')
        ->join('buildings', 'organizations.building_id', '=', 'buildings.id')
        ->select('organizations.*', 'buildings.latitude', 'buildings.longitude')
        ->whereBetween('buildings.latitude', [$minLat, $maxLat])
        ->whereBetween('buildings.longitude', [$minLng, $maxLng])
        ->get();

    return response()->json($organizations);


   }
}

