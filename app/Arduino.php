<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Arduino extends Model
{
    public function users(){
        return $this->belongsToMany(User::class)->withTimestamps();
      
    }
}
