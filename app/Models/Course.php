<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $guarded = [];

    protected $hidden = [
        'created_at',
        'updated_at',
    ];
    protected $with = ['sections'];

    public function sections()
    {
        return $this->hasMany(Section::class);
    }
}
