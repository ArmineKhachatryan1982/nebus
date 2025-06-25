<?php
namespace App\Services;

use App\Repositories\OrderRepository;
use App\Traits\FilterTrait;
class OrderService
{
    use FilterTrait;
    public function __construct(protected OrderRepository $repository){}

    public function getAllData($data){


        $dataFromFilter = $this->filter($data,"orders");
        // dd($dataFromFilter);

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
