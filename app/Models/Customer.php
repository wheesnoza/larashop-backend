<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Src\Frontend\Customer\Domain\Customer as DomainCustomer;
use Src\Frontend\Customer\Domain\CustomerEmail;
use Src\Frontend\Customer\Domain\CustomerFirstName;
use Src\Frontend\Customer\Domain\CustomerLastName;
use Src\Frontend\Customer\Domain\CustomerPassword;
use Src\Frontend\Customer\Domain\CustomerUuid;

class Customer extends Model
{
    use HasFactory;

    protected $fillable = [
        'uuid',
        'email',
        'password',
        'first_name',
        'last_name'
    ];

    protected $hidden = [
        'password',
    ];

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
