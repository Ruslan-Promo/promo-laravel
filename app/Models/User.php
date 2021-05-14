<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    const ROLE_DEFAULT = 'user';
    const ROLE_ADMIN = 'admin';
    const ROLE_AGENT = 'agent';

    const STATUS_DELETED = 'deleted';
    const STATUS_INACTIVE = 'inactive';
    const STATUS_ACTIVE = 'active';

    use HasFactory, Notifiable, HasRoles;

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

    /**
     * Agent
     *
     * @var object
     */
    public function agent()
    {
        return $this->hasOne(Agent::class, 'user_id', 'id');
    }

    /**
     * Check is Admin
     *
     * @var boolean
     */
    public function isAdmin(){
        return $this->hasRole(self::ROLE_ADMIN);
    }

    /**
     * Check is Agent
     *
     * @var boolean
     */
    public function isAgent(){
        return $this->hasRole(self::ROLE_AGENT);
    }
}
