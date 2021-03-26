<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{

    const ROLE_DEFAULT = 'user';
    const ROLE_ADMIN = 'admin';
    const ROLE_AGENT = 'agent';

    const STATUS_DELETED = 'deleted';
    const STATUS_INACTIVE = 'inactive';
    const STATUS_ACTIVE = 'active';

    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'surname',
        'name',
        'patronymic',
        'phone',
        'email',
        'gender',
        'password',
        'verify_token',
        'status',
        'role',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    # Relationships
    public function admin()
    {
        return $this->hasOne(Admin::class, 'user_id', 'id');
    }

    public function agent()
    {
        return $this->hasOne(Agent::class, 'user_id', 'id');
    }

    public function isAdmin(){
        return $this->role === self::ROLE_ADMIN;
    }

    public function isAgent(){
        return $this->role === self::ROLE_AGENT;
    }
}
