<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Order
 *
 * @property int $id
 * @property int $customer_id
 * @property int $agent_id
 * @property int $request_id
 * @property float $total
 * @property \Illuminate\Support\Carbon|null $date_registration
 * @property \Illuminate\Support\Carbon|null $date_start
 * @property \Illuminate\Support\Carbon|null $date_end
 * @property \Illuminate\Support\Carbon|null $date_payment
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Agent $agent
 * @property-read \App\Models\User $customer
 * @property-read \App\Models\ProductRequest $request
 * @method static \Illuminate\Database\Eloquent\Builder|Order newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Order newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Order query()
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereAgentId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereCustomerId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereDateEnd($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereDatePayment($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereDateRegistration($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereDateStart($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereRequestId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereTotal($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Order extends Model
{
    use HasFactory;

    /**
     * The attributes to be converted to base types.
     *
     * @var array
     */
    protected $casts = [
        'date_registration' => 'datetime',
        'date_start' => 'datetime',
        'date_end' => 'datetime',
        'date_payment' => 'datetime',
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'customer_id',
        'agent_id',
        'request_id',
        'total',
        'date_registration',
        'date_start',
        'date_end',
        'date_payment',
    ];

    /**
     * Customer
     *
     * @var object
     */
    public function customer()
    {
        return $this->belongsTo(User::class, 'customer_id', 'id');
    }

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
     * Request
     *
     * @var object
     */
    public function request()
    {
        return $this->belongsTo(ProductRequest::class, 'request_id', 'id');
    }
}
