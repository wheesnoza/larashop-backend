<?php declare(strict_types=1);

namespace App\Shared\Models;

use App\Shared\Casts\SnowflakeId;
use Illuminate\Database\Eloquent\Model;

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
        'id' => SnowflakeId::class,
    ];

    public function getIncrementing(): bool
    {
        return false;
    }
}
