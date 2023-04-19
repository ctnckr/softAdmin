<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function getPages(){
        return view('backend.pages.pages');
    }

    public function  getPagesAdd(){
        return view('backend.pages.page-add');
    }

    public function  getPagesEdit(){
        return view('backend.pages.page-edit');
    }
}
