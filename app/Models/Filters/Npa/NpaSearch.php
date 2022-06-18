<?php
/**
 * Created by PhpStorm.
 * User: Viktor
 * Date: 01.12.2019
 * Time: 22:36
 */

namespace App\Models\Filters\Npa;


use App\Services\Filters\BaseSeach;
use App\Services\Filters\Searchable;
use App\Models\Npa;

class NpaSearch implements Searchable
{

    const MODEL = Npa::class;

    use BaseSeach;

}