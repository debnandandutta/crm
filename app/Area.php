<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Area extends Model
{
    protected $fillable = [
        'areaName','regionId',
    ];

    public function region()
    {
        return $this->belongsTo(Region::class);
    }
}
