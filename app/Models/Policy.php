<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Policy
 *
 * @property int $id
 * @property int $agent_id
 * @property int $company_id
 * @property float|null $price
 * @property int $product_id
 * @property float|null $total
 * @property string|null $date_start
 * @property string|null $date_end
 * @property string|null $description
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Agent $agent
 * @property-read \App\Models\Company $company
 * @property-read \App\Models\Product $product
 * @method static \Illuminate\Database\Eloquent\Builder|Policy newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Policy newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Policy query()
 * @method static \Illuminate\Database\Eloquent\Builder|Policy whereAgentId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Policy whereCompanyId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Policy whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Policy whereDateEnd($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Policy whereDateStart($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Policy whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Policy whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Policy wherePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Policy whereProductId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Policy whereTotal($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Policy whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Policy extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'agent_id',
        'company_id',
        'price',
        'product_id',
        'total',
        'date_start',
        'date_end',
        'description',
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
     * Company
     *
     * @var object
     */
    public function company()
    {
        return $this->belongsTo(Company::class, 'company_id', 'id')->withDefault();
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
