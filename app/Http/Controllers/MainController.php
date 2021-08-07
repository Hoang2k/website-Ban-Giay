<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class MainController extends Controller
{
    


    public function index(){

        $new_product=Product::where('active',1)->orderbyDesc('id')->paginate(16);
        $featured_products=Product::where('active',1)->paginate(4);
        return view('frontend.home',[
            'title'=>'Shop Giày',
            'product'=>$new_product,
            'featured_products'=>$featured_products

        ]);
    }
}
