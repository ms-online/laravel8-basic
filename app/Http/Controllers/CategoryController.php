<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    public function AllCat()
    {
        // $categories = Category::latest()->get();
        $categories = DB::table('categories')->latest()->get();
        return view('admin.category.index', compact('categories'));
    }

    // 添加商品类型
    public function AddCat(Request $request)
    {
        //数据验证
        $validated = $request->validate([
            'category_name' => 'required|unique:categories|max:255',
        ], [
            'category_name.required' => '商品名称为必填项！',
            'category_name.max' => '商品名称最大长度为255个字符！',
            'category_name.unique' => '商品名称已存在'
        ]);

        //将数据插入到数据库
        //Eloquent ORM
        // Category::insert([
        //     'category_name' => $request->category_name,
        //     'user_id' => Auth::user()->id,
        //     'created_at' => Carbon::now()
        // ]);

        // $category = new Category;
        // $category->category_name = $request->category_name;
        // $category->user_id = Auth::user()->id;
        // $category->save();

        // Query builder
        DB::table('categories')->insert([
            'category_name' => $request->category_name,
            'user_id' => Auth::user()->id,
        ]);

        return Redirect()->back()->with('success', '商品类型添加成功！');
    }
}
