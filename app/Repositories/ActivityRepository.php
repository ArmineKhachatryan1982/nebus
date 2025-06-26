<?php

namespace App\Repositories;
use App\Interfaces\ActivityInterface;
use App\Interfaces\OrganizationInterface;
use App\Models\Order;

class ActivityRepository implements ActivityInterface
{
   public function index($model)
   {

      return  $model->organizations()->get();

   }
}
