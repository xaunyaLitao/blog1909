<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Zhouce extends Model
{
    protected $table = 'zhouce';
    protected $primaryKey = 'kao_id';
    public $timestamps = false;

    // 黑名单
    protected $guarded = [];
}
