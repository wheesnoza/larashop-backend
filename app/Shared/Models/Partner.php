<?php declare(strict_types=1);

namespace App\Shared\Models;

use Illuminate\Database\Eloquent\Model;
use Snowflake\SnowflakeCast;

final class Partner extends Model
{
    protected $fillable = [
        'id',
        'email',
        'password',
        'first_name',
        'last_name',
    ];

    protected $casts = [
        'id' => SnowflakeCast::class,
    ];

    public function getIncrementing(): bool
    {
        return false;
    }
}
