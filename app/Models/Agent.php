<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Agent
 *
 * @property int $id
 * @property int $user_id
 * @property int $company_id
 * @property string|null $specialty
 * @property \App\Models\Media $photo
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Company $company
 * @property-read \App\Models\User $user
 * @method static \Illuminate\Database\Eloquent\Builder|Agent newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Agent newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Agent query()
 * @method static \Illuminate\Database\Eloquent\Builder|Agent whereCompanyId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Agent whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Agent whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Agent wherePhoto($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Agent whereSpecialty($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Agent whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Agent whereUserId($value)
 * @mixin \Eloquent
 */
class Agent extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'company_id',
        'specialty',
        'photo_id',
    ];

    /**
     * Default info
     *
     * @var void
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    /**
     * Agent Company
     *
     * @var void
     */
    public function company()
    {
        return $this->belongsTo(Company::class, 'company_id', 'id')->withDefault();
    }

    /**
     * Agent photo
     *
     * @var void
     */
    public function photo()
    {
        return $this->belongsTo(Media::class, 'photo_id', 'id')->withDefault();
    }
}
