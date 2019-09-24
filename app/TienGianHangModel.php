<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TienGianHangModel extends Model
{
    protected $table = 'tien_gian_hang';
    protected $primarykey = 'id';
    protected $keyType = 'varchar';
    protected $fillable = [
        'id',
        'id_gian_hang',
        'tien_gia_hang',
        'created_at',
        'updated_at',
    ];
}
