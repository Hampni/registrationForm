<?php

namespace App\Models;

use App\Model;

class Countries extends Model
{
    protected const TABLE = 'Countries';
    public string $name;
    public string $iso;

}