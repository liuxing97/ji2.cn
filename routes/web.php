<?php
use Illuminate\Support\Facades\Route;

Route::get('/', function () { return redirect('/index'); });
Route::get('/admin', function () { return redirect('/admin/home'); });

// Authentication Routes...
$this->get('login', 'Auth\LoginController@showLoginForm')->name('auth.login');
$this->post('login', 'Auth\LoginController@login')->name('auth.login');
$this->post('logout', 'Auth\LoginController@logout')->name('auth.logout');

// Change Password Routes...
$this->get('change_password', 'Auth\ChangePasswordController@showChangePasswordForm')->name('auth.change_password');
$this->patch('change_password', 'Auth\ChangePasswordController@changePassword')->name('auth.change_password');

// Password Reset Routes...
$this->get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('auth.password.reset');
$this->post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('auth.password.reset');
$this->get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
$this->post('password/reset', 'Auth\ResetPasswordController@reset')->name('auth.password.reset');

Route::group(['middleware' => ['auth'], 'prefix' => 'admin', 'as' => 'admin.'], function () {
    Route::get('/home', 'HomeController@index');
    Route::resource('permissions', 'Admin\PermissionsController');
    Route::post('permissions_mass_destroy', ['uses' => 'Admin\PermissionsController@massDestroy', 'as' => 'permissions.mass_destroy']);
    Route::resource('roles', 'Admin\RolesController');
    Route::post('roles_mass_destroy', ['uses' => 'Admin\RolesController@massDestroy', 'as' => 'roles.mass_destroy']);
    Route::resource('users', 'Admin\UsersController');
    Route::post('users_mass_destroy', ['uses' => 'Admin\UsersController@massDestroy', 'as' => 'users.mass_destroy']);

    //文章管理系统
    //创建目录
    Route::get('/cms/menu/create',['uses' => 'Admin\CmsMenuController@createPage']);
    Route::post('/cms/menu/create',['uses' => 'Admin\CmsMenuController@createAct']);
    //我的目录
    Route::get('/cms/menu/list',['uses' => 'Admin\CmsMenuController@listPage']);
    Route::post('/cms/menu/del',['uses' => 'Admin\CmsMenuController@delAct']);
    Route::post('/cms/menu/change',['uses' => 'Admin\CmsMenuController@changeAct']);



    //创建分类
    Route::get('/cms/archive/create',['uses' => 'Admin\CmsArchiveController@createPage']);
    Route::post('/cms/archive/create',['uses' => 'Admin\CmsArchiveController@createAct']);
    //修改分类
    Route::get('/cms/archive/change/{number}',['uses' => 'Admin\CmsArchiveController@changePage']);
    Route::post('/cms/archive/change/{number}',['uses' => 'Admin\CmsArchiveController@change']);
    //删除分类
    Route::post('/cms/archive/delete',['uses' => 'Admin\CmsArchiveController@deleteAct']);
    //文章分类
    Route::get('/cms/archive/list',['uses' => 'Admin\CmsArchiveController@listPage']);



    //创建文章-在对应的档案表中生成自增文章记录
    Route::get('/cms/article/create',['uses' => 'Admin\CmsActicleController@creatPage']);
    Route::post('/cms/acticle/create',['uses' => 'Admin\CmsActicleController@creatAct']);
    //文章列表
    //我的文章
    Route::get('/cms/acticle/list');
});


Route::get('/index',['uses' => 'Page\Home@homePage']);
Route::get('/archive/type-{number}',['uses' => 'Page\Archive@archivePage']);

Route::get('page',function (){
    return view('/fanbo/layouts/page');
});