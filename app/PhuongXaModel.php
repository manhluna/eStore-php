<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PhuongXaModel extends Model
{
    protected $table = 'phuongxa';
    protected $primarykey = 'id';
    protected $keyType = 'varchar';
    protected $fillable = [
        'id',
        'id_tinhthanh',
        'id_quanhuyen',
        'phuongxa',
        'created_at',
        'updated_at',
    ];
}
