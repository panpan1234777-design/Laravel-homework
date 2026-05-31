<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Instructor extends Model
{
    protected $table="instructors";
    protected $fillable= [
        'name',
        'email',
        'phone',
        'image'
    ];
    public function batches(): BelongsToMany
    {
        return $this->belongsToMany(Batch::class,'batch_instructors')->withTimestamps();
    }


}
