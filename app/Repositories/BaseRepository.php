<?php

namespace App\Repositories;

use App\Interfaces\BaseInterface;
use Illuminate\Database\Eloquent\Model;

class BaseRepository implements BaseInterface
{
    protected $model;

    public function __construct(Model $model)
    {
        $this->model = $model;
    }


    public function store(array $attributes)
    {
        // dd($attributes);
        $created = [];
        foreach ($attributes as $item) {
           
            $created[] = $this->model->create($item);
        }
        // dd($created);
        return $created;


    }
}
