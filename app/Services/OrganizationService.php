<?php
namespace App\Services;

use App\Http\Resources\OrganizationResource;
use App\Interfaces\OrganizationInterface;
use App\Traits\FilterTrait;
class OrganizationService
{
    use FilterTrait;
    public function __construct(protected OrganizationInterface $repository){}

    public function getBuildingOrganization($data){

        $data = $this->repository->index($data);

        return $data;


    }
    public function showData($id){

        $data = $this->repository->show($id);

        return $data;

    }



}
