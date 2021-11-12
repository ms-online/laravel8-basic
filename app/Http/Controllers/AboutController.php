<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\HomeAbout;
use Illuminate\Support\Carbon;
use App\Models\Multipic;

class AboutController extends Controller
{
    public function HomeAbout()
    {
        $homeabout = HomeAbout::latest()->get();
        return view('admin.home.index', compact('homeabout'));
    }
    public function AddAbout()
    {
        return view('admin.home.create');
    }

    public function StoreAbout(Request $request)
    {
        HomeAbout::insert([
            'title' => $request->title,
            'short_des' => $request->short_des,
            'long_des' => $request->long_des,
            'created_at' => Carbon::now()
        ]);
        return Redirect()->route('home.about')->with('success', 'about信息保存成功！');
    }

    public function EditAbout($id)
    {
        $homeabout = HomeAbout::find($id);
        return view('admin.home.edit', compact('homeabout'));
    }

    public function UpdateAbout(Request $request, $id)
    {
        $update = HomeAbout::find($id)->update([
            'title' => $request->title,
            'short_des' => $request->short_des,
            'long_des' => $request->long_des,
        ]);

        return Redirect()->route('home.about')->with('success', 'about信息更新成功！');
    }

    public function DeleteAbout($id)
    {
        $delete = HomeAbout::find($id)->delete();
        return Redirect()->back()->with('success', 'about信息删除成功！');
    }


    //portfolio页面
    public function Portfolio()
    {
        $images = Multipic::all();
        return view('pages.portfolio', compact('images'));
    }
}
