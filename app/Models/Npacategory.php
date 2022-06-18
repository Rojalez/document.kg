<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Npacategory extends Model
{
    public function npa()
  {
    return $this->hasMany('App\Models\Npa');
  }
}
