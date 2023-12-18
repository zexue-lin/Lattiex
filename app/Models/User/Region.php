<?php

namespace App\Models\User;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @method static where(int[] $array)
 */
class Region extends Model
{
    use HasFactory;

    // 指定数据表
    protected $table = 'region';
}
