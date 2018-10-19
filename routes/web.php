<?php
use Illuminate\Support\Facades\Route;


//该路径不可使用ui.checkdata中间件
Route::get('/', function () { return redirect('/index'); });
//主页及页面显示相关路由，使用检查前端数据中间件
Route::group(['middleware' => ['client.visit','ui.checkdata']], function (){
    //两种首页路由，此时开启的是自动寻址模式
    //Route::get('/index',['uses' => 'Page\Home@homePage']);
    Route::get('/index',['uses' => 'Page\Home@homePage']) -> middleware('ui.tohome');
    //分类ID形式访问
    Route::get('/archive/num/{number}',function ($number){
        $archiveObj = new \App\CmsArchive();
        $archiveData = $archiveObj -> where('id',$number) -> first();
        if($archiveData){
            $archiveArray = $archiveData -> toArray();
            //查询这个分类下的所有文章
            $obj = new \App\CmsArticle();
            $data = $obj -> where('archive',$archiveData->id) -> orderBy('id','desc') -> simplePaginate(5);
            $dataListArray = $data -> toArray();
            return view('fanbo/pages/archive',[
                'dataListArray' => $dataListArray,
                'archiveData' => $archiveArray
            ]);
        }else{
            return "不存在的分类";
        }
    });
    //分类Alias形式访问
    Route::get('/archive/{archiveAlias}',function ($archiveAlias){
        $archiveObj = new \App\CmsArchive();
        $archiveData = $archiveObj -> where('alias',$archiveAlias) -> orderBy('id','desc') -> first();
        if($archiveData){
            $archiveArray = $archiveData -> toArray();
            //查询这个分类下的所有文章
            $obj = new \App\CmsArticle();
            $data = $obj -> where('archive',$archiveData->id) -> simplePaginate(5);
            $dataListArray = $data -> toArray();
            return view('fanbo/pages/archive',[
                'dataListArray' => $dataListArray,
                'archiveData' => $archiveArray
            ]);
        }else{
            return "不存在的分类";
        }
    });
    Route::get('/article/{number}',function ($number){
        $articleObj = new \App\CmsArticle();
        $articleData = $articleObj -> find($number);
        return view('fanbo/pages/article',[
            'articleData' => $articleData
        ]);
    });
});
// 登录登出路由
$this->get('login', 'Auth\LoginController@showLoginForm')->name('auth.login');
$this->post('login', 'Auth\LoginController@login')->name('auth.login');
$this->post('logout', 'Auth\LoginController@logout')->name('auth.logout');
// 更改密码路由
$this->get('change_password', 'Auth\ChangePasswordController@showChangePasswordForm')->name('auth.change_password');
$this->patch('change_password', 'Auth\ChangePasswordController@changePassword')->name('auth.change_password');
// 密码重置路由
$this->get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('auth.password.reset');
$this->post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('auth.password.reset');
$this->get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
$this->post('password/reset', 'Auth\ResetPasswordController@reset')->name('auth.password.reset');
//后台相关路由
Route::get('/admin', function () {
    return redirect('/admin/default/home');
});
Route::group(['middleware' => ['auth'], 'prefix' => 'admin', 'as' => 'admin.'], function () {

    //默认后台界面
    Route::get('/default/home', 'HomeController@index');
    //默认后台界面前端路由
    Route::group(['prefix' =>'/default/route/'],function (){
        Route::get('/index',function (){
            return view('/admin/default/page/index');
        });
        Route::get('/me/safety/password',function (){
            return view('/admin/default/page/me/password/change');
        });
        Route::get('/system/dataset',function (){
            return view('admin/default/page/system/dataset');
        });
        Route::get('/system/power',function (){
        });
        Route::get('/user/userpower',function (){
        });
        Route::get('/user/usergroup',function (){});
        Route::get('/user/users',function (){});
        Route::any('/menu',function (\Illuminate\Http\Request $request){
            //得到要加载的菜单信息id
            $menuId = $request -> input('menuId');
//        dump($menuId);
            if(!$menuId){
                $menuId = 'index';
            }
            //查询要加载的菜单情况
            $obj = new \App\Menu();
            //如果是加载默认菜单
            if($menuId == 'index'){
                $menuData = $obj -> where('main',1) -> first();
            }else{
                $menuData = $obj -> find($menuId);
            }
            //如果不存在要加载的菜单
            if($menuData){
                $menuArray = $menuData -> toArray();
            }else{
                $menuArray = [];
            }
            //传入一个参数，是当前要访问的菜单组数据，如果不存在该菜单组数据（即访问的菜单组不存在，则返回空）
            //第二个参数，当前菜单组内的菜单项数据
            //得到第二个参数，查询要访问的菜单内容
            if($menuArray){
                $itemObj = new \App\MenuItem();
                $itemObj = $itemObj -> where('group',$menuArray['id']) -> get();
                if($itemObj){
                    $menuItemsArray = $itemObj -> toArray();
                }else{
                    $menuItemsArray = [];
                }
            }else{
                $menuItemsArray = [];
            }


            return view('admin/default/page/menu/menu',[
                'menuArray' => $menuArray,
                'menuItemsArray' => $menuItemsArray,
            ]);
        });
        Route::get('/cms/archive',function (){
            return view('admin/default/page/cms/archive');
        });
        Route::get('/cms/article',function (\Illuminate\Http\Request $request){

            //本算法已达到目的，但算法结构产生了冗余，需进行优化-暂时忽略

            //得到要加载的分类信息id
            $archiveId = $request -> input('archiveId');
//        dump($archiveId);
            if(!$archiveId){
                //没有指定加载哪个分类
                $archiveId = 'all';
            }
            if($archiveId == 'all'){
                //当前要访问的分类
                $thisArchiveArray = [
                    'id' => 'all',
                    'title' => '所有分类',
                    'describe' => '所有分类',
                    'running' => '1',
                    'acticles' => 'Nah',
                    'created_at' => '0000-00-00 00:00:00',
                    'updated_at' => '0000-00-00 00:00:00'
                ];
                $obj = new \App\CmsArticle();
                $objData = $obj -> get();
                if($objData){
                    $articlesArray = $objData -> toArray();
                }else{
                    $articlesArray = null;
                }
            }
            else{
                //查询要加载的分类情况
                $obj = new \App\CmsArchive();
                //如果是加载默认分类
                if($archiveId == 'none'){
                    //查询所有分类，并输出第一个
                    $archiveData = $obj -> first();
                }else{
                    $archiveData = $obj -> find($archiveId);
                }
                //如果不存在要加载的分类
                if($archiveData){
                    $thisArchiveArray = $archiveData -> toArray();
                }else{
                    $thisArchiveArray = null;
                }
                //传入一个参数，是当前要访问的分类数据，如果不存在该分类数据（即访问的分类不存在，则返回空）
                //第二个参数，当前分类中的文章数据
                //得到第二个参数，查询要访问的分类的文章数据
                if($thisArchiveArray){
                    $itemObj = new \App\CmsArticle();
                    $itemObj = $itemObj -> where('archive',$thisArchiveArray['id']) -> get();
                    if($itemObj){
                        $articlesArray = $itemObj -> toArray();
                    }else{
                        $articlesArray = null;
                    }
                }else{
                    $articlesArray = null;
                }
            }

            //得到所有分类
            $archiveObj = new \App\CmsArchive();
            $archiveData = $archiveObj -> get();
            if($archiveData){
                $archiveListArray = $archiveData -> toArray();
                //追加一个分类,所有分类
                array_unshift($archiveListArray,[
                    'id' => 'all',
                    'title' => '所有分类',
                    'describe' => '所有分类',
                    'running' => '1',
                    'acticles' => 'Nah',
                    'created_at' => '0000-00-00 00:00:00',
                    'updated_at' => '0000-00-00 00:00:00'
                ]);
            }else{
                $archiveListArray = null;
            }
            return view('admin/default/page/cms/article',[
                //当前选择的分类的数据，如果值为null，有两种可能
                //1、当前访问的分类不存在
                //2、还没有创建任何分类
                //解决方案，在输出内容前，先判断是否存在分类
                'thisArchiveArray' => $thisArchiveArray,
                //当前分类下的文章内容
                'articlesArray' => $articlesArray,
                //所有分类
                'archiveListArray' => $archiveListArray
            ]);
        });
        Route::get('/aboutus',function (){
            return view('/admin/default/page/aboutUs');
        });
    });
    //设置Action
    Route::group(['prefix' => '/setting'],function (){
        //站点信息组
        Route::group(['prefix' => '/sitedata'], function (){
            //更改站点信息
            Route::post('/change', 'Admin\SiteDataController@update');
            //新建站点信息
            Route::post('/create','Admin\SiteDataController@create');
            //删除站点信息
            Route::post('/del','Admin\SiteDataController@delList');
        });
        //菜单相关
        Route::group(['prefix' => '/menu'], function (){
            //菜单组相关
            Route::group(['prefix' => '/group'], function (){
                //创建菜单分组
                Route::post('/create','Admin\MenuController@create');
                //批量删除菜单分组
                Route::post('/del','Admin\MenuController@delList');
                //更改
                Route::post('/change','Admin\MenuController@update');
            });
            //菜单项相关
            Route::group(['prefix' => '/item'], function (){
                //给对应的菜单添加菜单
                Route::post('/create','Admin\MenuItemController@create');
                //修改菜单项
                Route::post('/change','Admin\MenuItemController@update');
                //批量删除
                Route::post('/del','Admin\MenuItemController@delList');
            });
        });
        //CMS相关
        Route::group(['prefix' => '/cms'],function (){
            Route::group(['prefix' => '/archive'], function (){
                //新建
                Route::post('/create','Admin\CmsArchiveController@create');
                //删除
                Route::post('/del','Admin\CmsArchiveController@delList');
                //更改
                Route::post('/change','Admin\CmsArchiveController@update');
            });
            Route::group(['prefix' => '/article'], function (){
                //新建
                Route::post('/create','Admin\CmsArticleController@create');
                //删除
                Route::post('/del','Admin\CmsArticleController@delList');
                //更改
                Route::post('/change','Admin\CmsArticleController@update');
            });
        });
        //更新密码
        Route::post('/safaty/password/change','Admin\UsersPasswordController@update');
    });



    Route::resource('permissions', 'Admin\PermissionsController');
    Route::post('permissions_mass_destroy', ['uses' => 'Admin\PermissionsController@massDestroy', 'as' => 'permissions.mass_destroy']);
    Route::resource('roles', 'Admin\RolesController');
    Route::post('roles_mass_destroy', ['uses' => 'Admin\RolesController@massDestroy', 'as' => 'roles.mass_destroy']);
    Route::resource('users', 'Admin\UsersController');
    Route::post('users_mass_destroy', ['uses' => 'Admin\UsersController@massDestroy', 'as' => 'users.mass_destroy']);
});