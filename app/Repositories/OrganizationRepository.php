<?php

namespace App\Repositories;
use App\Models\Order;

class OrganizationRepository extends BaseRepository
{
    public function __construct(Order $model)
    {
        parent::__construct($model);
    }
}
