<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GianHangUserModel extends Model
{
    protected $table = 'users_gian_hang';
    protected $primarykey = 'user_id';
    protected $keyType = 'varchar';
    protected $fillable = [
        'user_id',
        'gh_ten',
        'gh_dia_chi',
        'gh_tien_loi_nhuan',
        'created_at',
        'updated_at',
    ];
}
