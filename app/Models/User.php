<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use App\Models\rayon;
use App\Models\student;
use App\Models\lates;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
        'rayon_id',
        
    ];

    /**
     * The attributes that should be hidden for     serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];
    // User model
    public function rayon()
    {
        return $this->belongsTo(rayon::class, 'rayon_id');
    }

    public function students()
    {
        return $this->hasMany(student::class, 'rayon_id');
    }

    public function lates()
    {
        return $this->hasMany(lates::class, 'user_id');
    }
}
