<?php declare(strict_types=1);

namespace App\Shared\Models;

use App\Shared\Casts\SnowflakeId;
use Illuminate\Foundation\Auth\User as Authenticatable;

final class Administrator extends Authenticatable
{
    protected $fillable = [
        'id',
        'email',
        'password',
    ];

    protected $hidden = [
        'password',
    ];

    protected $casts = [
        'id' => SnowflakeId::class,
    ];

    public function getIncrementing(): bool
    {
        return false;
    }
}
