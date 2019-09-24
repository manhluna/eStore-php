<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HoaDonModel extends Model
{
    protected $table = 'hoa_don';
    protected $primarykey = 'id';
    protected $keyType = 'varchar';
    protected $fillable = [
        'id',
        'id_kh',
        'tong_tien',
        'phan_cap',
        'status',
        'created_at',
        'updated_at',
        'ma_hoa_don',
        'ho_ten',
        'sdt_kh',
        'dia_chi_giao',
    ];
}
