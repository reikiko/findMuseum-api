<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Museum extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'city_id',
        'slug',
        'image',
        'desc',
        'excerpt',
    ];

    public function city()
    {
        return $this->belongsTo(City::class);
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }
}
