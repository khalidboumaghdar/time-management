<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class vacances extends Model
{
    use HasFactory;
    protected $table= 'vacances';
    protected $fillable = ['id ', 'employee_id', 'date', 'time', 'type'];

    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }
}
