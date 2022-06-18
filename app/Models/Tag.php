<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    public function question()
    {
      return $this->belongsToMany('App\Models\Question');
    }
}
