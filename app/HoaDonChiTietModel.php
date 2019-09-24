<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HoaDonChiTietModel extends Model
{
    protected $table = 'hoa_don_chi_tiet';
    protected $primarykey = 'id_hdct';
    protected $keyType = 'varchar';
    protected $fillable = [
        'id_hdct',
        'id_hoa_don',
        'id_sp',
        'sl_mua',
        'gia_sp',
        'thanh_tien',
        'created_at',
        'updated_at',
    ];
}
