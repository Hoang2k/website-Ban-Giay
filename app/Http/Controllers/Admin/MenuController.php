<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use \App\Http\Controllers\Controller;
use App\Http\Requests\Menu\CreateFormRequest;
use App\Http\Services\Menu\MenuService;
use App\Models\Menu;

class MenuController extends Controller
{

    protected $menuService;
    public function __construct(MenuService $menuService){
        return $this->menuService=$menuService;
    }
    public function create(){
        return view('admin.menus.add',[
            'title'=>'Thêm danh mục',
            'menu'=>$this->menuService->getParent()
        ]);
    }
    public function store(CreateFormRequest $request){
           $result=$this->menuService->create($request);
           return redirect()->back();
    }
    public function index(){
        $menu=$this->menuService->getAll();
        return view('admin.menus.list',[
            'title'=>'Danh sách danh mục',
            'menus'=>$menu
        ]);
    }
    public function destroy(Request $request){
        $result=$this->menuService->destroy($request);
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
    public function edit(Menu $menu){
        return view('admin.menus.edit',[
            'title'=>'Sửa danh mục',
            'menu'=>$menu,
            'menus'=>$this->menuService->getParent()
        ]);
    }
    public function update(Menu $menu , CreateFormRequest $request ){
        $result=$this->menuService->update($menu,$request);
        return redirect('admin/menus/index');
    }
}
