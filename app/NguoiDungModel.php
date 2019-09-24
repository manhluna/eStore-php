<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NguoiDungModel extends Model
{
    protected $table = 'users_profile';
    protected $primarykey = 'user_id';
    protected $keyType = 'varchar';
    protected $fillable = [
        'user_id',
        'kh_ten',
        'kh_gioi_tinh',
        'kh_ngay_sinh',
        'kh_dia_chi',
        'kh_cmnd',
        'kh_ngay_cap',
        'kh_image',
        'created_at',
        'updated_at',
    ];
}
