<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    public $timestamps = false;

    protected $guarded = [];

    public function course()
    {
        return $this->belongsTo(Course::class);
    }

    public function instructor()
    {
        return $this->belongsTo(User::class, 'instructor_id', 'id');
    }

    public function students()
    {
        return $this->hasMany(Roster::class, 'section_id', 'id');
    }

    public function attendances()
    {
        return $this->hasMany(Attendance::class, 'section_id', 'id');
    }
}
