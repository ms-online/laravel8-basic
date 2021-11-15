<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ChangePassword extends Controller
{
    public function CPassword()
    {
        return view('admin.body.change_password');
    }
    public function UpdatePassword(Request $request)
    {
        //验证
        $validateData = $request->validate([
            'current_password' => 'required',
            'password' => 'required|confirmed'
        ]);
        //confirmed规则：验证中的字段必须具有匹配字段{field}_confirmation。例如，如果验证字段是password ，则输入中必须存在password_confirmation字段进行匹配。

        $hashedPassword = Auth::user()->password;
        if (Hash::check($request->current_password, $hashedPassword)) {
            $user = User::find(Auth::id());
            $user->password = Hash::make($request->password);
            $user->save();
            Auth::logout();
            return redirect()->route('login')->with('success', '密码更新成功！');
        } else {
            return redirect()->back()->with('error', '当前密码验证不通过！');
        }
    }
}
