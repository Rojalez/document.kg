<?php
/**
 * Created by PhpStorm.
 * User: Viktor
 * Date: 01.12.2019
 * Time: 22:39
 */

namespace App\Models\Filters\Npa;


use App\Services\Filters\Filterable;
use Illuminate\Database\Eloquent\Builder;

class Organ implements Filterable
{

    public static function apply(Builder $builder, $value)
    {   
        
        return $builder->whereHas('organ', function ($query) use ($value){
            $query->whereIn('organ_id', $value);
        });
        
    }
}