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
}
