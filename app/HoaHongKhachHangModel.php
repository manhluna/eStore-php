<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HoaHongKhachHangModel extends Model
{
    protected $table = 'hoa_hong_khach_hang';
    protected $primarykey = 'id';
    protected $keyType = 'varchar';
    protected $fillable = [
        'id',
        'user_id',
        'ma_code_cha',
        'tien_hoa_hong',
        'created_at',
        'updated_at',
    ];
}
