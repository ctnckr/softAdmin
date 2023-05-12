<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeGetController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

#Route::get('/home', 'HomeGetController@index') -> name("index");
Route::prefix("admin")->group(function (){
    Route::get('/home', [HomeGetController::class, 'index'])->name('index');
    Route::get('/blogs', [App\Http\Controllers\Blogs\BlogController::class, 'getBlogs'])->name('blogs');
    Route::get('/blog-add', [App\Http\Controllers\Blogs\BlogController::class, 'getBlogsAdd'])->name('blog-add');
    Route::get('/blog-edit', [App\Http\Controllers\Blogs\BlogController::class, 'getBlogsEdit'])->name('blog-edit');

    Route::get('/blog-category', [App\Http\Controllers\Blogs\BlogController::class, 'getBlogsCategory'])->name('blog-category');
    Route::get('/blog-category-add', [App\Http\Controllers\Blogs\BlogController::class, 'getBlogsCategoryAdd'])->name('blog-category-add');
    Route::get('/blog-category-edit', [App\Http\Controllers\Blogs\BlogController::class, 'getBlogsCategoryEdit'])->name('blog-category-edit');

    Route::get('/menus', [App\Http\Controllers\Menus\MenusController::class, 'getMenus'])->name('menus');
    Route::get('/menu-add', [App\Http\Controllers\Menus\MenusController::class, 'getMenusAdd'])->name('menu-add');
    Route::get('/menu-edit', [App\Http\Controllers\Menus\MenusController::class, 'getMenusEdit'])->name('menu-edit');
    Route::post('/menus', [App\Http\Controllers\Menus\MenusController::class, 'postMenus'])->name('menus');
    Route::post('/menu-add', [App\Http\Controllers\Menus\MenusController::class, 'postMenusAdd'])->name('menu-add');
    Route::post('/menu-edit', [App\Http\Controllers\Menus\MenusController::class, 'postMenusEdit'])->name('menu-edit');


    Route::get('/pages', [App\Http\Controllers\Pages\PagesController::class, 'getPages'])->name('pages');
    Route::get('/pages-add', [App\Http\Controllers\Pages\PagesController::class, 'getPagesAdd'])->name('page-add');
    Route::get('/pages-edit', [App\Http\Controllers\Pages\PagesController::class, 'getPagesEdit'])->name('page-edit');


    Route::get('/sliders', [App\Http\Controllers\Sliders\SlidersController::class, 'getSliders'])->name('sliders');
    Route::get('/slider-add', [App\Http\Controllers\Sliders\SlidersController::class, 'getSlidersAdd'])->name('slider-add');
    Route::get('/slider-edit', [App\Http\Controllers\Sliders\SlidersController::class, 'getSlidersEdit'])->name('slider-edit');

    Route::get('/users', [App\Http\Controllers\Users\UsersController::class, 'getUsers'])->name('users');
    Route::get('/user-add', [App\Http\Controllers\Users\UsersController::class, 'getUsersAdd'])->name('user-add');
    Route::get('/user-edit', [App\Http\Controllers\Users\UsersController::class, 'getUsersEdit'])->name('user-edit');

    Route::get('/settings', [App\Http\Controllers\Settings\SettingsController::class, 'getsettings'])->name('settings');
    Route::get('/setting-edit', [App\Http\Controllers\Settings\SettingsController::class, 'getsettingsEdit'])->name('setting-edit');
});


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
