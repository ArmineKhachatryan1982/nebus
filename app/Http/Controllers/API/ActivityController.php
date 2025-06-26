<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\OrganizationResource;
use App\Models\Activity;
use App\Services\ActivityService;
use Illuminate\Http\Request;

class ActivityController extends Controller
{
     public function __construct(protected ActivityService $service){}
    public function organizationsByActivity(Activity $activity)
    {

        $data = $this->service->getData($activity);

        $resource = OrganizationResource::collection($data);

        return $resource;


    }
}
