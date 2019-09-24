<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class QuanHuyenModel extends Model
{
    protected $table = 'quanhuyen';
    protected $primarykey = 'id';
    protected $keyType = 'varchar';
    protected $fillable = [
        'id',
        'id_tinhthanh',
        'quanhuyen',
        'created_at',
        'updated_at',
    ];
}
