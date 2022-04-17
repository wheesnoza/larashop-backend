<?php declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

final class Partner extends Model
{
    use HasFactory;

    protected $fillable = [
        'uuid',
        'email',
        'password',
        'first_name',
        'last_name',
    ];
}
