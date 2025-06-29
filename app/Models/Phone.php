<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Phone extends Model
{
    use HasFactory;
    protected $guarded=[];

     public function organization()
    {
        return $this->belongsTo(Organization::class);
    }
}
