<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SoDiaChiModel extends Model
{
    protected $table = 'so_dia_chi';
    protected $primarykey = 'id';
    protected $keyType = 'varchar';
    protected $fillable = [
        'id',
        'id_kh',
        'ho_ten',
        'sdt_kh',
        'dia_chi',
        'created_at',
        'updated_at',
        'id_tinhthanh',
        'id_quanhuyen',
        'id_phuongxa',
    ];
}
