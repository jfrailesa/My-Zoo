<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Animal extends Model
{
    use HasFactory;
    protected $fillable = [
           'name',
           'species',
           'zoo_id',
        ];


    public function zoo()
    {
        return $this->belongsTo(Zoo::class)->withDefault(); 
    }

    public function medicalHistory()
    {
        return $this->hasOne(MedicalHistory::class);
    }

    public function caretakers()
    {
        return $this->belongsToMany(Caretaker::class)->withTimestamps();
    }
}
