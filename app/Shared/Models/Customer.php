<?php declare(strict_types=1);

namespace App\Shared\Models;

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
use Src\Frontend\Customer\Domain\CustomerUuid;

final class Customer extends Authenticatable
{
    use HasApiTokens;
    use Notifiable;

    protected $fillable = [
        'uuid',
        'email',
        'password',
        'first_name',
        'last_name'
    ];

    protected $hidden = [
        'id',
        'password',
    ];

    public function purchases(): HasMany
    {
        return $this->hasMany(Purchase::class);
    }

    public function coupons(): BelongsToMany
    {
        return $this->belongsToMany(Coupon::class, (new CustomerCoupon())->getTable());
    }

    public function toDomain(): DomainCustomer
    {
        return new DomainCustomer(
            new CustomerUuid($this->uuid),
            new CustomerEmail($this->email),
            new CustomerPassword($this->password),
            new CustomerFirstName($this->first_name),
            new CustomerLastName($this->last_name)
        );
    }
}
