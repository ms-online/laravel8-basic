<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Hero;
use Illuminate\Support\Carbon;
use Image;
use Illuminate\Support\Facades\Auth;


class HomeController extends Controller
{
    public function HomeHero()
    {
        $heroes = Hero::latest()->get();
        return view('admin.hero.index', compact('heroes'));
    }

    public function AddHero()
    {
        return view('admin.hero.create');
    }

    public function StoreHero(Request $request)
    {
        //图片上传
        $hero_image = $request->file('image');

        //图片处理扩展包（修改图片大小）
        $image_name = hexdec(uniqid()) . '.' . $hero_image->getClientOriginalExtension();
        Image::make($hero_image)->resize(1920, 1088)->save('image/hero/' . $image_name);

        $last_img = 'image/hero/' . $image_name;

        //插入到数据库
        Hero::insert([
            'title' => $request->title,
            'description' => $request->description,
            'image' => $last_img,
            'created_at' => Carbon::now()
        ]);
        return Redirect()->route('home.hero')->with('success', 'Hero添加成功！');
    }
}
