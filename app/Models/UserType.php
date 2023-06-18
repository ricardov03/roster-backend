<?php

namespace App\Models;

use App\Enums\UserTypes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class UserType extends Model
{
    use HasFactory;

    protected $guarded = [];
    public $timestamps = false;

    public function user(): BelongsToMany
    {
        return $this->belongsToMany(User::class);
    }

    public function admin()
    {
        return $this->where('id', UserTypes::ADMINISTRATOR->value);
    }
}
