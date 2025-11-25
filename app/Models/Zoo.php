<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Zoo extends Model
{
    /** @use HasFactory<\Database\Factories\ZooFactory> */
    use HasFactory;

     protected $fillable = [
           'name',
           'size',
           'location'
        ];

    public function animals()
    {
        return $this->hasMany(Animal::class);
    }
}
