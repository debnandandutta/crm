<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Territory extends Model
{
    protected $fillable = [
        'territoryName','areaId','regionId'
    ];
}
