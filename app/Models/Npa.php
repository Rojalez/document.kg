<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use App\Models\Filters\Npa\NpaSearch;
use Illuminate\Database\Eloquent\Builder;
use Laravel\Scout\Searchable;

class Npa extends Model
{
    use Searchable;
    protected $table = 'npa';
    

    public function getNpaBySearch(Request $request):Builder
    {
        $builder = (new NpaSearch())->apply($request);
        return $builder;
    }

    public function category()
    {
        return $this->belongsTo('App\Models\NpaCategory');
    }

    public function organ()
    {
      return $this->belongsToMany('App\Models\Organ', 'npa_organ');
    }

    public function toSearchableArray()
    {
        $array = $this->toArray();

        // Customize array...

        return $array;
    }

    public function users()
    {
      return $this->belongsToMany('App\User', 'npa_user');
    }
}