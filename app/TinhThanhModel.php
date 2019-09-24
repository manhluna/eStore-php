<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TinhThanhModel extends Model
{
    protected $table = 'tinhthanh';
    protected $primarykey = 'id';
    protected $keyType = 'varchar';
    protected $fillable = [
        'id',
        'tinhthanh',
        'created_at',
        'updated_at',
    ];
}
