<?php

namespace App\Http\Services\Product;
use App\Models\Menu;
use App\Models\Product;
use Session;

class productServices
{
 public function getMenu(){
     $menu=Menu::where('active',1)->get();
     return $menu;
 }

    protected function isValidPrice($request){
        if($request->input('price') !=0 && $request->input('price_sale') !=0 &&
        $request->input('price') <=$request->input('price_sale')
        ){
            Session::flash('error','Giá khuyến mại phải nhỏ hơn giá gốc ');
            return false;
        }
        if((int)$request->input('price') ==0 &&  $request->input('price_sale') !=0)
        {
           Session::flash('error','Vui lòng nhập giá gốc');
           return false;
        }
        return true;
    }

    public function insert($request){
        $isValidPrice=$this->isValidPrice($request);
        if($isValidPrice==false)return false;
        $image = $request->file('file');
        $imageName = time() . '.' . $image->extension();
        $image->move(public_path('backend/images'), $imageName);
        //dd($imageName);
        try {
            
            // Product::create([
            //     'name'=>(string)$request->input('name'),
            //     'thumb'=>$imageName,
            //     'description'=>(string)$request->input('description'),
            //     'price'=>(integer)$request->input('price'),
            //     'price_sale'=>(integer)$request->input('price_sale'),
            //     'menu_id'=>(integer)$request->input('menu_id'),
            //     'active'=>(integer)$request->input('active'),
            //]);
            $product=new Product;
            $product->name=$request->name;
            $product->thumb=$imageName;
            $product->description=$request->description;
            $product->price=$request->price;
            $product->price_sale=$request->price_sale;
            $product->menu_id=$request->menu_id;
            $product->active=$request->active;
            $product->save();
           
            Session::flash('success','Thêm sản phẩm thành công');
        } catch (Exception $err) {
            Session::flash('error',$err->getMessage());
            return false;
        }
        return true;
    }

    public function getProduct(){
        $product=Product::with('menu')->orderByDesc('id')->paginate(20);
        return $product;
    }
    public function update($request,$product){
        $isValidPrice=$this->isValidPrice($request);
        if($isValidPrice==false)return false;
        $image = $request->file('file');
        $imageName = time() . '.' . $image->extension();
        $image->move(public_path('backend/images'), $imageName);
        try {
            
            $product->name=$request->name;
            $product->thumb=$imageName;
            $product->description=$request->description;
            $product->price=$request->price;
            $product->price_sale=$request->price_sale;
            $product->menu_id=$request->menu_id;
            $product->active=$request->active;
            $product->save();
           
            Session::flash('success','Cập nhật sản phẩm thành công');
        } catch (Exception $err) {
            Session::flash('error',$err->getMessage());
            return false;
        }
    }
    public function delete($request){
       $id=(int)$request->input('id');
       $product=Product::where('id',$id)->first();
       if($product)$product->delete();
       return false;

     
    }
}