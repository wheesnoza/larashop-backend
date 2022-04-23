<?php declare(strict_types=1);

namespace App\Shared\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Snowflake\SnowflakeCast;

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
        'id' => SnowflakeCast::class,
    ];

    public function getIncrementing(): bool
    {
        return false;
    }
}
