<?php
namespace App\Helpers;


class Helper
{
    public static function menu($menus,$parent_id=0,$char=''){
        $html ='';
      //  dd($menus);
     
      foreach ($menus as $key => $menu) {
            if ($menu->parent_id == $parent_id){
               $html .='
               <tr>
               
               <td>'.$menu->id.'</td>
               <td>'. $char . $menu->name .'</td>
               <td>'.self::active($menu->active).'</td>
               <td>'.$menu->updated_at.'</td>
               <td style="display:flex">
                   <a class="btn btn-primary btn-xs" href="admin/menus/edit/'.$menu->id.'">Sửa </i></a>
                   <a class="btn btn-danger btn-xs" style="margin-left:3px;" href="javascript:void(0)" onclick="removeRow(' . $menu->id . ', \'admin/menus/destroy\')">Xóa</i></a>
               </td>
               
               
               </tr>
               ';
               unset($menu[$key]);
               $html .=self::menu($menus,$menu->id,$char .'--');
           }
        } 
        return $html; 
      }

      public static function active($active){
           return $active==0 ? '<span class="btn btn-danger btn-xs">No</span>' : 
            '<span class="btn btn-success btn-xs">Yes</span>';
            
      }
}