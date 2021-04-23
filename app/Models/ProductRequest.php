<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\ProductRequest
 *
 * @property int $id
 * @property int $product_id
 * @property int $user_id
 * @property string $date_created
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Product $product
 * @property-read \App\Models\User $user
 * @method static \Illuminate\Database\Eloquent\Builder|ProductRequest newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ProductRequest newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ProductRequest query()
 * @method static \Illuminate\Database\Eloquent\Builder|ProductRequest whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductRequest whereDateCreated($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductRequest whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductRequest whereProductId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductRequest whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductRequest whereUserId($value)
 * @mixin \Eloquent
 */
class ProductRequest extends Model
{
    use HasFactory;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'product_id',
        'user_id',
        'date_created',
    ];

    /**
     * User
     *
     * @var object
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    /**
     * Product
     *
     * @var object
     */
    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id', 'id');
    }
}
