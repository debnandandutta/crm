<?php

namespace App\Models;

use App\Enquiry;
use Illuminate\Database\Eloquent\Model;
use App\User;

class Comment extends Model
{
    protected $fillable = [
    'ticket_id', 'user_id', 'comment','enquiry_id'
	];

	public function ticket()
	{
	    return $this->belongsTo(Ticket::class);
	}

	public function user()
	{
	    return $this->belongsTo(User::class);
	}
    public function enquiry()
    {
        return $this->hasMany(Enquiry::class);
    }

}
