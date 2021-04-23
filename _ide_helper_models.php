<?php

// @formatter:off
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App\Models{
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
 */
	class Agent extends \Eloquent {}
}

namespace App\Models{
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
 */
	class AgentRequest extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Category
 *
 * @property int $id
 * @property string $name
 * @property string|null $description
 * @property int $parent_id
 * @property int $order
 * @property string $slug
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read Category $parent
 * @method static \Illuminate\Database\Eloquent\Builder|Category newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Category newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Category query()
 * @method static \Illuminate\Database\Eloquent\Builder|Category whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Category whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Category whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Category whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Category whereOrder($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Category whereParentId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Category whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Category whereUpdatedAt($value)
 */
	class Category extends \Eloquent {}
}

namespace App\Models{
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
 */
	class Company extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Media
 *
 * @property int $id
 * @property string $name
 * @property string $type
 * @property string $path
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Media newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Media newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Media query()
 * @method static \Illuminate\Database\Eloquent\Builder|Media whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Media whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Media whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Media wherePath($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Media whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Media whereUpdatedAt($value)
 */
	class Media extends \Eloquent {}
}

namespace App\Models{
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
 */
	class Order extends \Eloquent {}
}

namespace App\Models{
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
 */
	class Policy extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Product
 *
 * @property int $id
 * @property string $name
 * @property float $price_year
 * @property string|null $description
 * @property int $agent_id
 * @property string|null $advantages
 * @property \Illuminate\Database\Eloquent\Collection|\App\Models\Media[] $images
 * @property float|null $price_six_month
 * @property float|null $price_one_month
 * @property float|null $discount
 * @property int $category_id
 * @property \Illuminate\Database\Eloquent\Collection|\App\Models\StatusesProduct[] $status
 * @property string|null $expiration_date
 * @property string|null $options
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Agent $agent
 * @property-read \App\Models\Category $category
 * @property-read int|null $images_count
 * @property-read int|null $status_count
 * @method static \Illuminate\Database\Eloquent\Builder|Product newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Product newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Product query()
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereAdvantages($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereAgentId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereCategoryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereDiscount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereExpirationDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereImages($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereOptions($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product wherePriceOneMonth($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product wherePriceSixMonth($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product wherePriceYear($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereUpdatedAt($value)
 */
	class Product extends \Eloquent {}
}

namespace App\Models{
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
 */
	class ProductRequest extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\StatusesProduct
 *
 * @method static \Illuminate\Database\Eloquent\Builder|StatusesProduct newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|StatusesProduct newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|StatusesProduct query()
 */
	class StatusesProduct extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\User
 *
 * @property int $id
 * @property string $surname
 * @property string $name
 * @property string|null $patronymic
 * @property string|null $phone
 * @property string $email
 * @property string $role
 * @property string|null $gender
 * @property \Illuminate\Support\Carbon|null $email_verified_at
 * @property string $password
 * @property string|null $remember_token
 * @property string $status
 * @property string|null $verify_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Agent|null $agent
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @property-read int|null $notifications_count
 * @method static \Database\Factories\UserFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User query()
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmailVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereGender($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePatronymic($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereRole($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereSurname($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereVerifyToken($value)
 */
	class User extends \Eloquent {}
}

