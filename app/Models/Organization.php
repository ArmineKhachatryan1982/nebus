<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Organization extends Model
{
    use HasFactory;
    protected $guarded=[];

    public function building(): BelongsTo
    {
        return $this->belongsTo(Building::class);
    }
     public function phones(): HasMany
    {
        return $this->hasMany(Phone::class);
    }

   public function activities(): BelongsToMany
    {
       return $this->belongsToMany(Activity::class, 'organization_activities', 'organization_id', 'activity_id');
    }
}
