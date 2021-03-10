<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Agent_request extends Model
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
        'logo',
        'images',
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
}
