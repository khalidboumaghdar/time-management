<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;
    protected $fillable = ['cin', 'nom', 'prenom', 'poste', 'image'];

    public function getFullNameAttribute()
    {
        return $this->nom . ' ' . $this->prenom;
    }
    public function pointages()
    {
        return $this->hasMany(Pointage::class);
    }
    public function vacances()
    {
        return $this->hasMany(vacances::class);
    }
}
