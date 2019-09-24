<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TienGianHangLogModel extends Model
{
    protected $table = 'tien_gian_hang';
    protected $primarykey = 'id';
    protected $keyType = 'varchar';
    protected $fillable = [
        'id',
        'id_gian_hang',
        'tien_gia_hang',
        'ngay_lanh',
        'created_at',
        'updated_at',
    ];
}
