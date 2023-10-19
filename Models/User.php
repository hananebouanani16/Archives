<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable;
    use SoftDeletes;
    protected $dates = ['deleted_at'];
    protected $guarded = [];
    public function getDateFormat()
    {
        return 'Y-d-m H:i:s';
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
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
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    public function groupes()
    {
        return $this->belongsToMany(Groupe::class, 'Group_users');
    }
    public function role()
    {
        return $this->belongsToMany(Module::class, 'users_modules');
    }
    public function perm()
    {
        return $this->belongsToMany(Objet::class, 'users_objets');
    }
    public function tache()
    {
        return $this->belongsToMany(Tache::class, 'taches_users');
    }
}
