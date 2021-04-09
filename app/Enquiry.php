<?php

namespace App;

use App\Models\Comment;
use App\Region;
use App\Models\Department;
use Illuminate\Database\Eloquent\Model;

class Enquiry extends Model
{
    protected $fillable = [
        'user_id', 'department_id', 'enquiry_id','title','shop','mobileOne',
        'mobileTwo', 'address', 'region_id','area','territory','town',
        'expiry', 'tm','callerType', 'description','callType','complainType','storeType','dsr_name','preferrence','status',
    ];

    public function regions()
    {
        return $this->belongsTo(Region::class);
    }
    public function department()
    {
        return $this->belongsTo(Department::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
