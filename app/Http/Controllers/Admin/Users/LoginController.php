<?php

namespace App\Http\Controllers\Admin\Users;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Session;

class LoginController extends Controller
{
    public function index(){
        return view('Admin.main',[
            'title'=>'Đăng nhập hệ thống'
        ]);
    }
    public function store(Request $request){
       // dd($request->input());
        $request->validate([
            'email' => 'required|email:filter',
            'pass' => 'required',
        ]);
        if (Auth::attempt([
        'email' => $request->input('email'),
        'password' => $request->input('pass')
    ], $request->input('remember'))) {
            return redirect()->route('admin.main');
        }
        Session::flash('error','Email hoặc mật khẩu không chính xác');
        return redirect()->back();
    }
}
