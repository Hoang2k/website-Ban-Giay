<?php
namespace App\Http\Controllers\Category;

use Illuminate\Http\Request;
use App\Models\Category;


class indexController extends  \App\Http\Controllers\Controller
{
    private $category;
    public function __construct(Category $category){
        $this->category=$category;
    }

    public function index(){
        $category=Category::all();
        return view('Admin.category.index',
           [
               'category'=>$category
           ]
    );
    }
    public function storeCategory(Request $request){
        $category=new Category();
        $category->name=$request->name;
        $category->slug=$request->slug;
        $category->description=$request->description;
        $category->status=$request->status;
        $category->save();
        return response()->json(
          [
            'success'=>true,
            'message'=>'Thêm Danh Mục Thành Công'
          ]
        );
         
    }
    public function getCategoryById($id){
        $category=Category::find($id);
        return response()->json($category);
    }
    public function updateCategory(Request $request){
      $category=Category::find($request->id);
      $category->name=$request->name;
      $category->slug=$request->slug;
      $category->description=$request->description;
      $category->status=$request->status;
      $category->save();
      return response()->json(
        [
          'success'=>true,
          'message'=>'Cập Nhật Danh Mục Thành Công'
        ]
      );
    }
    public function deleteCategoryById($id){
      $category=Category::find($id);
      $category->delete();
      return response()->json($category);
    }
}