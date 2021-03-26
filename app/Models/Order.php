<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
}
