<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TongTienHoaHongModel extends Model
{
    protected $table = 'tongtienhoahong';
    protected $primaryKey = 'id_khachhang';
    protected $keyType = 'varchar';
    protected $fillable = [
        'id_khachhang',
        'tien_da_lanh',
    ];
}
