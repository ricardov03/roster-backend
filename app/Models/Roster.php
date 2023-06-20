<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Roster extends Model
{
    public $timestamps = false;
    protected $guarded = [];
    protected $with = ['student'];

    public function student()
    {
        return $this->belongsTo(User::class, 'student_id', 'id');
    }

    public function section()
    {
        return $this->belongsTo(Section::class, 'section_id', 'id');
    }
}
