<?php

namespace App\Models;

use App\Enquiry;
use App\Region;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    protected $guarded = [];


    public function tickets()
    {
        return $this->hasMany(Ticket::class);
    }


    public function enquiry()
    {
        return $this->hasMany(Enquiry::class)->where('preferrence',0);
    }
    public function ticket()
    {
        return $this->hasMany(Enquiry::class)->where('preferrence',1);
    }

    public function knowledgeBase()
    {
        return $this->hasMany(KnowledgeBase::class);
    }

    public function user()
    {
        return $this->hasMany(User::class);
    }

    public function posts()
    {   
        return $this->hasMany('App\Models\KnowledgeBase','department_id');
    }
}
