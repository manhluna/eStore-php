<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UsersModel extends Model
{
    protected $table = 'users';
    protected $primarykey = 'id';
    protected $keyType = 'varchar';
    protected $fillable = [
        'id',
        'phone',
        'password',
        'email',
        'role',
        'code',
        'active',
        'created_at',
        'updated_at',
    ];
}
