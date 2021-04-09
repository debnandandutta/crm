<?php

namespace App;

use App\Models\Department;
use Illuminate\Database\Eloquent\Model;

class Region extends Model
{

    protected $fillable = [
        'title',
    ];

    public function area()
    {
        return $this->hasMany(Area::class);
    }
    public function enquiry()
    {
        return $this->hasMany(Enquiry::class)->where('preferrence',0);
    }
    public function ticket()
    {
        return $this->hasMany(Enquiry::class)->where('preferrence',1);
    }

}
