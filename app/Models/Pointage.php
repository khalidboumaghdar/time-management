<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pointage extends Model
{
    use HasFactory;

    protected $fillable = ['id ', 'employee_id', 'Date', 'time', 'Type'];

    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }
}
