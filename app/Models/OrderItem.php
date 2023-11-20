<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    use SoftDeletes;
    use Sluggable;

    protected $table = 'order_items';
    protected $guarded = [];

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }

    public function dish() {
        return $this->belongsTo(Dish::class);
    }
}
