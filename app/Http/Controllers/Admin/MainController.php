<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MainController extends Controller
{
    public function index(){
        $user = Auth::user();
      //  dd($user);
        return view('admin.home',[
            'user'=>$user,
            'title'=>'Thông tin cá nhân'
        ]);
    }
}
