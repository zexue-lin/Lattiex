<?php

namespace App\Models\Home;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;

    // 指定数据表
    protected $table = 'contact';

    /**
     * 不可批量赋值的属性
     *
     * @var array
     */
    // 如果想让所有属性都可以批量赋值，可以将 $guarded 定义成一个空数组
    protected $guarded = [];
}
