<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use App\Models\User;

class Role extends Model
{
    use SoftDeletes;
    use Sluggable;

    protected $table = 'roles';
    protected $guarded = [];

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }

    public function users()
    {
        return $this->hasMany(User::class);
    }
}
