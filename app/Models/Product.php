<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $casts = [
        'price_year' => 'float',
        'price_six_month' => 'float',
        'price_one_month' => 'float',
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'price_year',
        'description',
        'agent_id',
        'advantages',
        'images',
        'price_six_month',
        'price_one_month',
        'discount',
        'category_id',
        'status',
        'expiration_date',
        'options',
    ];
}
