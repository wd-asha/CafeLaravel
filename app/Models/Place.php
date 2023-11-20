<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Place extends Model
{
    use SoftDeletes;

    protected $table = 'places';
    protected $guarded = [];
}
