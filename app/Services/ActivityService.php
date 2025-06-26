<?php
namespace App\Services;

use App\Http\Resources\OrganizationResource;
use App\Interfaces\ActivityInterface;
use App\Interfaces\OrganizationInterface;
use App\Traits\FilterTrait;
class ActivityService
{
    use FilterTrait;
    public function __construct(protected ActivityInterface $repository){}

    public function getData($data){

        $data = $this->repository->index($data);

        return $data;



    }



}
