<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Agent extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'company_id',
        'specialty',
        'photo',
    ];

    # Inverse of the relationship
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
