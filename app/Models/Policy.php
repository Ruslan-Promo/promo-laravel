<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
