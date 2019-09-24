<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PhanCapHoaHongModel extends Model
{
    protected $table = 'phan_cap';
    protected $primarykey = 'id';
    protected $keyType = 'varchar';
    protected $fillable = [
        'id',
        'so_cap',
        'ti_le',
        'status',
        'created_at',
        'updated_at',
    ];
}
