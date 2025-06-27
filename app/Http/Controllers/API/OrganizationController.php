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
    /**
 * @OA\Get(
 *     path="/api/organizations/{id}",
 *     summary="Получить организацию по ID",
 *     description="Возвращает организацию по указанному ID",
 *     operationId="getOrganizationById",
 *     tags={"Organizations"},
 *     @OA\Parameter(
 *         name="id",
 *         in="path",
 *         description="ID организации",
 *         required=true,
 *         @OA\Schema(type="integer", example=5)
 *     ),
 *     @OA\Parameter(
 *         name="X-API-KEY",
 *         in="header",
 *         description="API ключ для доступа",
 *         required=true,
 *         @OA\Schema(type="string", example="cfd91a1a-251d-4029-9cfd-d84ce6005c64")
 *     ),
 *     @OA\Response(
 *         response=200,
 *         description="Успешный ответ",
 *         @OA\JsonContent(
 *             type="object",
 *             @OA\Property(property="id", type="integer", example=5),
 *        
 *         )
 *     ),
 *     @OA\Response(
 *         response=401,
 *         description="Unauthorized — отсутствует или неверный API ключ"
 *     ),
 *     security={{ "api_key": {} }}
 * )
 */


    public function show($id){

        $data = $this->service->showData($id);

        $resource =new OrganizationResource($data);

        return $resource;

    }
}
