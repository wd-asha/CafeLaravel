<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Place extends Model
{
    use SoftDeletes;

    protected $table = 'places';
    protected $guarded = [];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function table() {
        return $this->belongsTo(Table::class);
    }

}
