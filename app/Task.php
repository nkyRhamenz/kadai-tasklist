<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $fillable = ['content','status','user_id'];
    
    public function user()
    {
        return $this->belongTo(User::class);
    }
}
