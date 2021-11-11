<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Brand;
use App\Models\Multipic;
use Illuminate\Support\Carbon;
use Image;

class BrandController extends Controller
{
    //路由守卫
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function AllBrand()
    {
        $brands = Brand::latest()->paginate(5);
        return view('admin.brand.index', compact('brands'));
    }

    public function AddBrand(Request $request)
    {
        //初始化验证
        $validated = $request->validate([
            'brand_name' => 'required|unique:brands|min:2',
            'brand_image' => 'required|mimes:jpg,jpeg,png',

        ], [
            'brand_name.required' => '品牌名称为必填项！',
            'brand_name.min' => '品牌名称至少长度为2个字符！',
            'brand_image.required' => '图片为必填项！',
            'brand_image.mimes' => '图片格式不正确！'
        ]);

        //图片上传
        $brand_image = $request->file('brand_image');

        // $name_gen = hexdec(uniqid());
        // $img_ext = strtolower($brand_image->getClientOriginalExtension());
        // $img_name = $name_gen . '.' . $img_ext;
        // $up_location = 'image/brand/';
        // $last_img = $up_location . $img_name;
        // $brand_image->move($up_location, $img_name);

        //图片处理扩展包（修改图片大小）
        $image_name = hexdec(uniqid()) . '.' . $brand_image->getClientOriginalExtension();
        Image::make($brand_image)->resize(300, 200)->save('image/brand/' . $image_name);

        $last_img = 'image/brand/' . $image_name;

        //插入到数据库
        Brand::insert([
            'brand_name' => $request->brand_name,
            'brand_image' => $last_img,
            'created_at' => Carbon::now()
        ]);
        return Redirect()->back()->with('success', '品牌形象添加成功！');
    }

    public function Edit($id)
    {
        $brands = Brand::find($id);
        return view('admin.brand.edit', compact('brands'));
    }

    public function Update(Request $request, $id)
    {
        //初始化验证
        $validated = $request->validate([
            'brand_name' => 'required|min:2',
            'brand_image' => 'required|mimes:jpg,jpeg,png',

        ], [
            'brand_name.required' => '品牌名称为必填项！',
            'brand_name.min' => '品牌名称至少长度为2个字符！',
            'brand_image.required' => '图片为必填项！',
            'brand_image.mimes' => '图片格式不正确！'
        ]);

        //旧图片
        $old_image = $request->old_image;
        //图片上传(新图片)
        $brand_image = $request->file('brand_image');

        $name_gen = hexdec(uniqid());
        $img_ext = strtolower($brand_image->getClientOriginalExtension());
        $img_name = $name_gen . '.' . $img_ext;
        $up_location = 'image/brand/';
        $last_img = $up_location . $img_name;
        $brand_image->move($up_location, $img_name);

        //删除旧图片
        //unlink() 函数删除文件
        unlink($old_image);

        //插入到数据库
        Brand::find($id)->update([
            'brand_name' => $request->brand_name,
            'brand_image' => $last_img,
            'created_at' => Carbon::now()
        ]);
        return Redirect()->back()->with('success', '品牌形象更新成功！');
    }

    public function Delete($id)
    {
        //删除目录中的图片
        $brand = Brand::find($id);
        $old_image = $brand->brand_image;
        unlink($old_image);

        //删除数据库中的品牌形象数据
        Brand::find($id)->delete();
        return Redirect()->back()->with('success', '品牌形象删除成功！');
    }

    // 多图上传
    public function Multipic()
    {
        $images = Multipic::all();
        return view('admin.multipic.index', compact('images'));
    }

    //保存多图
    public function StoreImg(Request $request)
    {
        //初始化验证
        $validated = $request->validate([
            'image' => 'required',

        ], [

            'image.required' => '图片为必填项！',
        ]);

        //图片上传
        $multi_images = $request->file('image');

        //遍历多图
        foreach ($multi_images as $multi_image) {
            //图片处理扩展包（修改图片大小）
            $image_name = hexdec(uniqid()) . '.' . $multi_image->getClientOriginalExtension();
            Image::make($multi_image)->resize(300, 200)->save('image/multi/' . $image_name);

            $last_img = 'image/multi/' . $image_name;

            //插入到数据库
            Multipic::insert([
                'image' => $last_img,
                'created_at' => Carbon::now()
            ]);
        }

        return Redirect()->back()->with('success', '多图上传添加成功！');
    }
}
