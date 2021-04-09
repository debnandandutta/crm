<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Retailer extends Model
{
    protected $fillable = [
        'name','email','address','mobile','type','regionId','areaId','territoryId','townId',
    ];
}
