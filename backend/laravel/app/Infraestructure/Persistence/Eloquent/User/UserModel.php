<?php

declare(strict_types=1);

namespace App\Infraestructure\Persistence\Eloquent\User;

use Illuminate\Database\Eloquent\Model;

final class UserModel extends Model
{
    protected $table = 'users';

    protected $fillable = [
        'id',
        'name',
        'email'
    ];

    public $incrementing = false;

    protected $keyType = 'string';

    protected $casts = [
        'id' => 'string',
    ];
}