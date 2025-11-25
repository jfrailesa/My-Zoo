<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class zoo extends Model
{
    /** @use HasFactory<\Database\Factories\ZooFactory> */
    use HasFactory;

     protected $fillable = [
           'name',
           'size',
           'location'
        ];
}
