<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HoaHongKhachHangLogModel extends Model
{
    protected $table = 'hoa_hong_khach_hang_log';
    protected $primarykey = 'id';
    protected $keyType = 'varchar';
    protected $fillable = [
        'id',
        'user_id',
        'so_tien_da_lanh',
        'ngay_lanh',
        'created_at',
        'updated_at',
    ];
}
