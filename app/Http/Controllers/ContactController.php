<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContactController extends Controller
{
    //路由守卫
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        return view('contact');
    }
}
