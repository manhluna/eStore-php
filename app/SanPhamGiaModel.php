<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SanPhamGiaModel extends Model
{
    protected $table = 'san_pham_gia';
    protected $primarykey = 'id_sp';
    protected $keyType = 'varchar';
    protected $fillable = [
        'id_sp',
        'gia_goc',
        'gia_km',
        'sp_description',
        'created_at',
        'updated_at',
    ];
}
