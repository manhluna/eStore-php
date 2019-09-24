<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DanhMucSanPhamModel extends Model
{
    protected $table = 'san_pham_danh_muc';
    protected $primarykey = 'id';
    protected $keyType = 'varchar';
    protected $fillable = [
        'id',
        'dm_ten',
        'created_at',
        'updated_at',
    ];
}
