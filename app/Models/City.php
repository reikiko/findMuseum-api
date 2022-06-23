<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
    ];

    public function museums(){
        return $this->hasMany(Museum::class);        
    }
    public function getRouteKeyName(){
        return 'slug';
    }
}

