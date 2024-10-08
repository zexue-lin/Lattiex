<?php

namespace App\Models\Home;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comments extends Model
{
    use HasFactory;

    // 指定的数据表（文章评论表）
    protected $table = 'comments';

    /**
     * 不可批量复制的属性
     *
     * @var array
     */
    // 如果想要让所有属性都可以批量赋值，可以将 $guarded 定义成一个空数组
    protected $guarded = [];
}
