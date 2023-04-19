<?php

namespace App\Http\Controllers\Menus;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MenusController extends Controller
{
    public function getMenus(){
        return view('backend.menus.menus');
    }

    public function  getMenusAdd(){
        return view('backend.menus.menu-add');
    }

    public function  getMenusEdit(){
        return view('backend.menus.menu-edit');
    }


}
