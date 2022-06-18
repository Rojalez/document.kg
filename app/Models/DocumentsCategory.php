<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DocumentsCategory extends Model
{
    public function documents()
    {
      return $this->hasMany('App\Models\Document', 'category_id');
    }

    public function family_category()
    {
      return $this->belongsTo($this, 'family_category');
    }

    public function childrens()
    {
      return $this->hasMany($this, 'family_category');
    }



}
