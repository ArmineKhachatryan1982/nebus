<?php
namespace App\Services;

use App\Repositories\IncomeRepository;
use App\Traits\FilterTrait;
class IncomeService
{
    use FilterTrait;
    public function __construct(protected IncomeRepository $repository){}

    public function getAllData($data){


        $dataFromFilter = $this->filter($data,"incomes");
        // dd($dataFromFilter);

        if(isset($dataFromFilter['data']) && count($dataFromFilter['data'])>0){

            $saveInDB = $this->repository->store(attributes: $dataFromFilter['data']);

            if(count( $saveInDB)>0){
                return true;
            }

        }else{
            return false;
        }

    }



}
