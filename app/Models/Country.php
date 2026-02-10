<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    use HasFactory;

    protected $table = "country";

    public function student() {
        return $this->belongsTo(Student::class);
    }

    public function teacher() {
        return $this->belongsTo(Teacher::class);
    }
    
    public function subject() {
        return $this->belongsTo(Subject::class);
    }

    public function country() {
        return $this->belongsTo(Country::class);
    }

    public function computer() {
        return $this->hasMany(Computer::class);
    }
}
