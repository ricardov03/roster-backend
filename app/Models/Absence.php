<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Absence extends Model
{
    public $timestamps = false;

    public function roster()
    {
        return $this->belongsTo(Roster::class);
    }

    public function sections()
    {
        return $this->belongsToMany(Absence::class, 'absences', 'id', 'id', 'id', 'absences_id', 'absences');
    }
}
