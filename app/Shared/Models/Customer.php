<?php declare(strict_types=1);

namespace App\Shared\Models;

use App\Shared\Casts\SnowflakeId;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Src\Frontend\Customer\Domain\Customer as DomainCustomer;
use Src\Frontend\Customer\Domain\CustomerEmail;
use Src\Frontend\Customer\Domain\CustomerFirstName;
use Src\Frontend\Customer\Domain\CustomerLastName;
use Src\Frontend\Customer\Domain\CustomerPassword;
use Src\Frontend\Customer\Domain\CustomerId;

final class Customer extends Authenticatable
{
    use HasApiTokens;
    use Notifiable;

    protected $fillable = [
        'id',
        'email',
        'password',
        'first_name',
        'last_name'
    ];

    protected $hidden = [
        'password',
    ];

    protected $casts = [
        'id' => SnowflakeId::class,
    ];

    public function purchases(): HasMany
    {
        return $this->hasMany(Order::class);
    }

    public function coupons(): BelongsToMany
    {
        return $this->belongsToMany(Coupon::class, (new CustomerCoupon())->getTable());
    }

    public function fullName(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => sprintf("%s %s", $this->last_name, $this->first_name)
        );
    }

    public function toDomain(): DomainCustomer
    {
        return new DomainCustomer(
            new CustomerId($this->id),
            new CustomerEmail($this->email),
            new CustomerPassword($this->password),
            new CustomerFirstName($this->first_name),
            new CustomerLastName($this->last_name)
        );
    }

    public function getIncrementing(): bool
    {
        return false;
    }
}
