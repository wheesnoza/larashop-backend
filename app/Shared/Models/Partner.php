<?php declare(strict_types=1);

namespace App\Shared\Models;

use Illuminate\Database\Eloquent\Model;

final class Partner extends Model
{
    protected $fillable = [
        'uuid',
        'email',
        'password',
        'first_name',
        'last_name',
    ];
}
