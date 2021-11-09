<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'user_id',
        'category_name',
    ];

    // 一对一关系
    //hasOne 方法的第一个参数是关联模型的类名(也就是关联对象模型)。第二个参数是关联模型的字段名。第三个参数是当前模型的对应字段名

    // public function user()
    // {
    //     return $this->hasOne(User::class, 'id', 'user_id');
    // }
}
