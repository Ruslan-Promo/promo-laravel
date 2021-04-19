<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
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
        'worktime',
        'address',
        'inn',
        'ogrn',
        'kpp',
        'fullname',
        'shortname',
        'license',
    ];

    /**
     * Images
     *
     * @var object
     */
    public function images()
    {
        return $this->belongsToMany(Media::class, 'companies_media', 'company_id', 'media_id');
    }
}
