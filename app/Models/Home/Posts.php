<?php

namespace App\Models\Home;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User\User as UserModel; //定义用户模型

class Posts extends Model
{
    use HasFactory;

    // 指定数据表(文章表)
    protected $table = 'posts';

    /**
     * 不可批量赋值的属性
     *
     * @var array
     */
    // 如果想让所有属性都可以批量赋值，可以将 $guarded 定义成一个空数组
    protected $guarded = [];

    // 定义与用户模型的关联关系
    public function author()
    {
        return $this->belongsTo(UserModel::class,'author_id');
    }
}
