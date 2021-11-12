<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\HomeAbout;
use Illuminate\Support\Carbon;

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
}
