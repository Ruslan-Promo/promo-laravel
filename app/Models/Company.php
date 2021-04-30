<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Company
 *
 * @property int $id
 * @property string $name
 * @property string|null $description
 * @property \Illuminate\Database\Eloquent\Collection|\App\Models\Media[] $images
 * @property string|null $worktime
 * @property string|null $address
 * @property string|null $inn
 * @property string|null $ogrn
 * @property string|null $kpp
 * @property string|null $fullname
 * @property string|null $shortname
 * @property string|null $license
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read int|null $images_count
 * @method static \Illuminate\Database\Eloquent\Builder|Company newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Company newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Company query()
 * @method static \Illuminate\Database\Eloquent\Builder|Company whereAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Company whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Company whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Company whereFullname($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Company whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Company whereImages($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Company whereInn($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Company whereKpp($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Company whereLicense($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Company whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Company whereOgrn($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Company whereShortname($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Company whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Company whereWorktime($value)
 * @mixin \Eloquent
 */
class Company extends Model
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
        'worktime',
        'address',
        'inn',
        'ogrn',
        'kpp',
        'fullname',
        'shortname',
        'license',
    ];

    /**
     * Images
     *
     * @var object
     */
    public function images()
    {
        return $this->belongsToMany(Media::class, 'companies_media', 'company_id', 'media_id');
    }
}
