<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Agent extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'company_id',
        'specialty',
        'photo_id',
    ];

    /**
     * Default info
     *
     * @var object
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    /**
     * Agent Company
     *
     * @var object
     */
    public function company()
    {
        return $this->belongsTo(Company::class, 'company_id', 'id')->withDefault();
    }

    /**
     * Agent photo
     *
     * @var object
     */
    public function photo()
    {
        return $this->hasOne(Media::class, 'photo_id', 'id')->withDefault();
    }
}
