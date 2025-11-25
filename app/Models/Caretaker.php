<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Caretaker extends Model
{
    /** @use HasFactory<\Database\Factories\CaretakerFactory> */
    use HasFactory;

    protected $fillable = [
           'name',
           'id',
           'yearsofexp'
        ];
    
    public function animals()
    {
        return $this->belongsToMany(Animal::class)->withTimestamps();
    }

}
