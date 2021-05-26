<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\SearchableTrait;

class News extends Model
{
    use HasFactory, SearchableTrait;

    /**
     * The attributes to be converted to base types.
     *
     * @var array
     */
    protected $casts = [
        'image' => 'string',
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'description',
        'image',
    ];
}
