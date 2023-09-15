<?php

namespace App\Models\User;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    use HasFactory;

    // 指定数据表
    protected $table = 'users';

    /**
     * 模型日期的存储格式
     *
     * @var string
     */
    // protected $dateFormat = 'U';

    /**
     * 可批量赋值属性
     * nickname sex phone email
     * @var array
     */
    // 为了确保安全性，Laravel 要求您明确地指定哪些属性允许进行批量赋值，以防止不经意间赋值敏感字段。
    // 此处定义的字段为允许进行批量赋值的字段
    // protected $fillable = ['nickname', 'sex', 'phone', 'email'];

    /**
     * 不可批量赋值的属性
     *
     * @var array
     */
    // 如果想让所有属性都可以批量赋值，可以将 $guarded 定义成一个空数组
    protected $guarded = [];
}
