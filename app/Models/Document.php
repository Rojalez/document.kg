<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    public function category()
    {
      return $this->belongsTo('App\Models\DocumentsCategory');
    }

    public function users()
    {
      return $this->belongsToMany('App\User', 'document_user');
    }
}
