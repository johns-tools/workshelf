<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LoginAuthKey extends Model
{
    protected $table = 'login_auth_keys';

    protected $fillable = [
        'key_01',
        'key_02',
    ];
}
