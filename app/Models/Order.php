<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use SoftDeletes;
    use Sluggable;

    protected $table = 'orders';
    protected $guarded = [];

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }

    public function items() {
        return $this->hasMany(OrderItem::class);
    }
}
