<?php
namespace App\Services;

use App\Models\Organization;
use App\Traits\FilterTrait;
class FilterService
{
    use FilterTrait;
    public function __construct(protected Organization $model){}

    public function filterData($data){


        $dataFromFilter = $this->filter($data,"orders");
        // dd($dataFromFilter);



    }



}
