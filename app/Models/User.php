<?php

namespace App\Models;

use App\Enums\UserTypes;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use Notifiable;
    use TwoFactorAuthenticatable;
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'last_name',
        'user_type_id',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array<int, string>
     */
    protected $appends = [
        'profile_photo_url',
    ];

    protected $with = [
        'type',
    ];

    public function type(): BelongsToMany
    {
        return $this->belongsToMany(UserType::class)->withTimestamps();
    }

    public function scopeTypeAdmin()
    {
        return $this->whereHas('type', function (Builder $query) {
            $query->where('user_type_id', UserTypes::ADMINISTRATOR);
        });
    }

    public function scopeTypeProfessor()
    {
        return $this->whereHas('type', function (Builder $query) {
            $query->where('user_type_id', UserTypes::PROFESSOR);
        });
    }

    public function scopeTypeStudent()
    {
        return $this->whereHas('type', function (Builder $query) {
            $query->where('user_type_id', UserTypes::STUDENT);
        });
    }
}
