<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Building extends Model
{
    use HasFactory;
     protected $guarded=[];

    public function organizations()
    {
        return $this->hasMany(Organization::class);
    }
}
