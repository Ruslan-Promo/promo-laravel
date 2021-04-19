<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AgentRequest extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'description',
        'logo_id',
        'worktime',
        'address',
        'inn',
        'ogrn',
        'kpp',
        'fullname',
        'shortname',
        'license',
        'products',
        'email',
    ];

    /**
     * Logo company
     *
     * @var object
     */
    public function logo()
    {
        return $this->belongsTo(Media::class, 'logo_id', 'id')->withDefault();
    }

    /**
     * Images company
     *
     * @var object
     */
    public function images()
    {
        return $this->belongsToMany(Media::class, 'agent_requests_media', 'requests_id', 'media_id');
    }
}
