<?php
/**
 * Created by PhpStorm.
 * User: Viktor
 * Date: 01.12.2019
 * Time: 22:47
 */

namespace App\Models\Filters\Npa;


use App\Services\Filters\Filterable;
use Illuminate\Database\Eloquent\Builder;

class Date implements Filterable
{


    public static function apply(Builder $builder, $value)
    {
        return $builder->whereDate('data_submit','=', date($value));
    }
}