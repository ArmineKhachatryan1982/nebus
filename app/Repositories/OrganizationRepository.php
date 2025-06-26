<?php

namespace App\Repositories;
use App\Interfaces\OrganizationInterface;
use App\Models\Order;
use App\Models\Organization;

class OrganizationRepository implements OrganizationInterface
{
   public function index($model)
   {

     return  $model->organizations()->get();

   }

    public function show($id){

        return Organization::with(['phones', 'building', 'activities']) // если есть связи
        ->findOrFail($id);

    }
}
