<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Town extends Model
{
    protected $fillable = [
        'townName','regionId','areaId','territoryId'
    ];
}
