<?php
namespace App\Http\Controllers\Product;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;

class productController extends \App\Http\Controllers\Controller
{
    public function index(){
        $product=Product::all();
        $category=Category::all();
        return view('Admin.product.index',[
            'product'=>$product,
            'category'=>$category
        ]);
    }
    public function storeProduct(Request $request){
        $image=$request->file('image');
        $imageName=time(). '.'.$image->extension();
        $image->move(public_path('backend/images'), $imageName);
        $product=new Product();
        $product->name=$request->name;
        $product->slug=$request->slug;
        $product->images=$imageName;
        $product->price=$request->price;
        $product->price_sale=$request->price_sale;
        $product->quantity=$request->quantity;
        $product->description=$request->description;
        $product->category_id=$request->category_id;
        $product->status=$request->status;
        $r=$product->save();
        if($r)return redirect()->back()->with('Thêm sản phẩm thành công');


    }
}