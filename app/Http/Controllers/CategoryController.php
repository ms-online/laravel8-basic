<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function AllCat()
    {
        return view('admin.category.index');
    }

    // 添加商品类型
    public function AddCat(Request $request)
    {
        //数据验证
        $validated = $request->validate([
            'category_name' => 'required|unique:category_name|max:255',
        ], [
            'category_name.required' => '商品名称为必填项！',
            'category_name.max' => '商品名称最大长度为255个字符！'
        ]);
    }
}
