<?php

namespace App;

use App\Reply;
use Illuminate\Database\Eloquent\Model;

class Thread extends Model
{
     protected $guarded = [];
	// to use in the url
    public function path()
    {
    	return '/threads/'.$this->id;
    }
    public function replies()
    {
    	return $this->hasMany(Reply::class);
    }
    public function creater()
    {
    	return $this->belongsTo(User::class,'user_id');
    }

    public function addReply($reply)
    {
    	$this->replies()->create($reply);
    }
}
