<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    public function tag()
    {
      return $this->belongsToMany('App\Models\Tag');
    }

    public function answers()
    {
      return $this->hasMany('App\Models\Answer');
    }

    public function user()
    {
      return $this->belongsTo('App\User');
    }
}
