<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Manager extends Model
{
    protected $fillable = [
        'name','email','mobile','type','regionId','areaId','territoryId','townId'
    ];
}
