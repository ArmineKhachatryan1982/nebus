<?php
namespace App\Services;

use App\Repositories\OrderRepository;
use App\Repositories\SaleRepository;
use App\Traits\FilterTrait;
class SaleService
{
    use FilterTrait;
    public function __construct(protected SaleRepository $repository){}

    public function getAllData($data){


        $dataFromFilter = $this->filter($data,"sales");

        if(isset($dataFromFilter['data']) && count($dataFromFilter['data'])>0){

            $saveInDB = $this->repository->store(attributes: $dataFromFilter['data']);

            if(count( $saveInDB)>0){
                return [
                    'status' => true,

                ];
            }

        }else{
            if (array_key_exists('dateFrom', $dataFromFilter)) {
                // Ключ "dateFrom" существует
                // dd($dataFromFilter['dateFrom'][0]);
                // return $dataFromFilter;
                return [
                    'status' => false,
                    'errors' => $dataFromFilter
                ];
            }
            return [
                'status' => false,

            ];
        }

    }



}
