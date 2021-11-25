<?php

namespace App\Modules\Admin\User\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as AuthUser;
use Laravel\Passport\HasApiTokens;

class User extends AuthUser
{
    use HasFactory, hasApiTokens;

    protected $fillable = [
        'firstname', 'lastname', 'email', 'phone', 'status', 'created_at', 'updated_at'
    ];

    protected $hidden = [
        'password'
    ];
}
