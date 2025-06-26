<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Api\BaseController;
use App\Http\Controllers\Controller;
use App\Http\Resources\OrganizationResource;
use App\Models\Building;
use App\Services\OrganizationService;


class OrganizationController extends BaseController
{
     public function __construct(protected OrganizationService $service){}
    public function organizationsByBuilding(Building $building)
    {
        $data = $this->service->getBuildingOrganization($building);

        $resource = OrganizationResource::collection($data);

        return $resource;


    }
    public function show($id){

        $data = $this->service->showData($id);

        $resource =new OrganizationResource($data);

        return $resource;

    }
}
