<?php

namespace App\Repositories;

use App\Models\Income;
use App\Models\Stock;

class IncomeRepository extends BaseRepository
{
    public function __construct(Income $model)
    {
        parent::__construct($model);
    }
}
