<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Activity extends Model
{
    use HasFactory;
     protected $guarded=[];

    public function organizations(): BelongsToMany
     {
        return $this->belongsToMany(Organization::class, 'organization_activities', 'activity_id', 'organization_id');
     }
     public function activity_sub(){
        return $this->hasMany(ActivitySub::class);
     }
}
