<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Product
 *
 * @property int $id
 * @property string $name
 * @property float $price_year
 * @property string|null $description
 * @property int $agent_id
 * @property string|null $advantages
 * @property \Illuminate\Database\Eloquent\Collection|\App\Models\Media[] $images
 * @property float|null $price_six_month
 * @property float|null $price_one_month
 * @property float|null $discount
 * @property int $category_id
 * @property \Illuminate\Database\Eloquent\Collection|\App\Models\StatusesProduct[] $status
 * @property string|null $expiration_date
 * @property string|null $options
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Agent $agent
 * @property-read \App\Models\Category $category
 * @property-read int|null $images_count
 * @property-read int|null $status_count
 * @method static \Illuminate\Database\Eloquent\Builder|Product newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Product newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Product query()
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereAdvantages($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereAgentId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereCategoryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereDiscount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereExpirationDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereImages($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereOptions($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product wherePriceOneMonth($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product wherePriceSixMonth($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product wherePriceYear($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereUpdatedAt($value)
 * @mixin \Eloquent
 */
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
        return $this->belongsTo(Agent::class, 'agent_id', 'id')->withDefault();
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
        return $this->belongsTo(StatusesProduct::class, 'status_id', 'id');
    }

}
