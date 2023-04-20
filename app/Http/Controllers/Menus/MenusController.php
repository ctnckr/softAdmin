<?php

namespace App\Http\Controllers\Menus;
use App\Models\Menu;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;


class MenusController extends Controller
{
    public function getMenus(){
        return view('backend.menus.menus');
    }

    public function  getMenusAdd(){
        $menus = Menu::all();
        return view('backend.menus.menu-add')->with('menus',$menus);
    }

    public function  getMenusEdit(){
        return view('backend.menus.menu-edit');
    }

    public function postMenusAdd(Request $request){
        try {
            $slug = Str::slug($request->menu_name, '-');
            $request->merge(['menu_slag'=>$slug]);
            Menu::create($request->all());
            return response(['status'=>'success','title'=>'Başarılı','content'=>'Menü Eklendi']);
        }
        catch (\Exception $e){
            return response(['status'=>'error','title'=>'Başarısız','content'=>'Menü Eklenemedi']);
        }
    }

}
