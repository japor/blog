<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    //
    protected $fillable = ['user_id','title','body'];

    public function comments(){
    	return $this->hasMany(Comment::class);
    }

    public function user(){
    	return $this->belongsTo(User::class);
    }

    public function addComment($body){
    	 

    	$this->comments()->create(compact('body'));
    }

    
}