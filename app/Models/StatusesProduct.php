<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\StatusesProduct
 *
 * @method static \Illuminate\Database\Eloquent\Builder|StatusesProduct newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|StatusesProduct newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|StatusesProduct query()
 * @mixin \Eloquent
 */
class StatusesProduct extends Model
{
    protected $table = 'statuses_product';

    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
    ];
}
