<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Product\ProductRequest;
use App\Http\Services\Product\ProductServices;
use App\Models\Product;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     protected $productServices;
     public function __construct(ProductServices $productServices){
         return $this->productServices=$productServices;
     }
    public function index()
    {
        $product=$this->productServices->getProduct();
        return view('admin.product.list',[
            'title'=>'Danh sách sản phẩm',
            'product'=>$product
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $menu=$this->productServices->getMenu();
        return view('admin.product.add',[
            'title'=>'Thêm sản phẩm mới',
            'menus'=>$menu
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductRequest $request)
    {
         $result=$this->productServices->insert($request);
         return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        return view('admin.product.edit',[
            'title'=>'Chỉnh sửa sản phẩm',
            'product'=>$product,
            'menus'=>$this->productServices->getMenu()

        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
  

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProductRequest $request, Product $product)
    {
        $result=$this->productServices->update($request,$product);
        return redirect('admin/products/index');
       
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $result=$this->productServices->delete($request);
        if($result){
            return response()->json([
                'error'=>false,
                'message'=>'Xóa danh mục thành công'
            ]);
        }
        return response()->json([
            'error'=>true,
           
        ]);
    }
}
