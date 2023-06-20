<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    public $timestamps = false;

    public function section()
    {
        return $this->belongsTo(Section::class);
    }

    public function absences()
    {
        return $this->hasMany(Absence::class);
    }
}
