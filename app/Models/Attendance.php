<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    public $timestamps = false;

    protected $guarded = [];

    public function section()
    {
        return $this->belongsTo(Section::class);
    }

    public function absences()
    {
        return $this->belongsToMany(Roster::class, 'absences', 'attendance_id', 'roster_id', 'id', 'id');
    }
}
