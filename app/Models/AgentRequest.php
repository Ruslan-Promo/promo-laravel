<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


/**
 * App\Models\AgentRequest
 *
 * @property int $id
 * @property string $name
 * @property string|null $description
 * @property \App\Models\Media $logo
 * @property \Illuminate\Database\Eloquent\Collection|\App\Models\Media[] $images
 * @property string|null $worktime
 * @property string|null $address
 * @property string|null $inn
 * @property string|null $ogrn
 * @property string|null $kpp
 * @property string|null $fullname
 * @property string|null $shortname
 * @property string|null $license
 * @property string|null $products
 * @property string $email
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read int|null $images_count
 * @method static \Illuminate\Database\Eloquent\Builder|AgentRequest newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|AgentRequest newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|AgentRequest query()
 * @method static \Illuminate\Database\Eloquent\Builder|AgentRequest whereAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AgentRequest whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AgentRequest whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AgentRequest whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AgentRequest whereFullname($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AgentRequest whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AgentRequest whereImages($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AgentRequest whereInn($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AgentRequest whereKpp($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AgentRequest whereLicense($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AgentRequest whereLogo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AgentRequest whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AgentRequest whereOgrn($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AgentRequest whereProducts($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AgentRequest whereShortname($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AgentRequest whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AgentRequest whereWorktime($value)
 * @mixin \Eloquent
 */
class AgentRequest extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'description',
        'logo_id',
        'worktime',
        'address',
        'inn',
        'ogrn',
        'kpp',
        'fullname',
        'shortname',
        'license',
        'products',
        'email',
    ];

    /**
     * Logo company
     *
     * @var object
     */
    public function logo()
    {
        return $this->belongsTo(Media::class, 'logo_id', 'id')->withDefault();
    }

    /**
     * Images company
     *
     * @var object
     */
    public function images()
    {
        return $this->belongsToMany(Media::class, 'agent_requests_media', 'requests_id', 'media_id');
    }
}
