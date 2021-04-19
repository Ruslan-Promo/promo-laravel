<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    /**
     * The attributes to be converted to base types.
     *
     * @var array
     */
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
        'price_six_month',
        'price_one_month',
        'discount',
        'category_id',
        'status_id',
        'expiration_date',
        'options',
    ];

    /**
     * Agent
     *
     * @var object
     */
    public function agent()
    {
        return $this->belongsTo(Agent::class, 'agent_id', 'id');
    }

    /**
     * Category
     *
     * @var object
     */
    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id')->withDefault();
    }

    /**
     * Images
     *
     * @var object
     */
    public function images()
    {
        return $this->belongsToMany(Media::class, 'products_media', 'product_id', 'media_id');
    }

    /**
     * Status
     *
     * @var object
     */
    public function status()
    {
        return $this->belongsToMany(StatusesProduct::class, 'status_id', 'id');
    }

}
