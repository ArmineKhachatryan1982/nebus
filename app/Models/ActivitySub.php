<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ActivitySub extends Model
{
    use HasFactory;
     protected $guarded=[];
     public function activities(){
        return $this->belongsTo(Activity::class,'activity_id');
     }
}
