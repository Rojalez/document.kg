<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Organ extends Model
{
    protected $table = 'organ';

    public function npa()
    {
      return $this->belongsToMany('App\Models\Npa', 'npa_organ');
    }
}
