<?php
use Illuminate\Support\Facades\Route;



Route::get('/huodong/wechat/2018/11/11',function (\Illuminate\Http\Request $request){
    //活动介绍页面：
        //获取用户信息
        //提供参与活动按钮
        //参与活动按钮，先进行发起人登记请求
        //再进行跳转至活动详情页面，该页面携带活动发起人的openid
        //然后要求用户点击转发

    //判断授权的原则，先看是否是从授权页面过来的，即携带了code，再看是否已授权过

    //判断是否存在code
    $code = $request -> input('code');
    $applyShouquanUrl = false;
    $weUserInfo = false;
    $grent =false;
    $huodongUrl = false;
    if($code){
        //输出视图，且告诉前端已授权，直接显示参与活动按钮
        $grent = true;
        //获取网页微信Obj
        $webPageObj = new \App\Http\Controllers\WeChat\WebPage();
        //获取用户信息前初始化工作
        $webPageObj -> getAccessTokenAndOpenid($code);
        //得到用户信息,后面交给前端
        $weUserInfo = $webPageObj -> getUserInfo();
        //参与活动链接
        $appid = \App\WechatConfig::where('key','appid')->first();
        $appid = $appid -> value;
        //参与活动实际地址
        $jumpSrc = "http://www.ji2.cn/huodong/wechat/2019/11/11/action?openid=".$weUserInfo->openid;
//        dump($jumpSrc);
        $huodongUrl = "https://open.weixin.qq.com/connect/oauth2/authorize?appid={$appid}&redirect_uri=".$jumpSrc."&response_type=code&scope=snsapi_userinfo&state=STATE#wechat_redirect";

        //        echo "输出视图，且告诉前端已授权，直接显示参与活动按钮";
        //        测试发送红包
        //        $payObj = new \App\Http\Controllers\WeChat\Pay();
        //        $payObj -> payToUser($weUserInfo->openid);
        //        echo "123";




    }else{
        //判断是否已授权(已将用户信息保存到session中)，如果没有授权，跳转到授权页面
        $userInfo = session('wechat_web_userinfor');
        if(!$userInfo){
            //输出视图，且告诉前端未授权,显示微信授权按钮
            $grent = false;
            $weUserInfo = false;
            $huodongUrl = false;
            $appid = \App\WechatConfig::where('key','appid')->first();
            $appid = $appid -> value;
            $thisUrl = "http://www.ji2.cn/huodong/wechat/2018/11/11";
            //参与活动链接/申请授权，授权后刷新页面，刷新页面时，给跳转链接加入openid
            $applyShouquanUrl = "https://open.weixin.qq.com/connect/oauth2/authorize?appid={$appid}&redirect_uri=".$thisUrl."&response_type=code&scope=snsapi_userinfo&state=STATE#wechat_redirect";
//            echo "输出视图，且告诉前端未授权,显示微信授权按钮<br>";
//            echo "<a href='{$huodongUrl}'>参与活动</a>";
        }else{

            //直接进入(已在其他页面授权)
//            echo "直接进入，已再其他页面授权";
        }
    }
    //测试时，直接界面输出未授权/活动跳转链接
    return view('/fanbo/huodong/2018-11-11',[
        'grent' => $grent,
        'userInfo' => $weUserInfo,
        'applyShouquanUrl' => $applyShouquanUrl,
        'huodongUrl' => $huodongUrl
    ]);
})->middleware('ui.checkdata');
//活动详情页面
Route::get('/huodong/wechat/2018/11/11/action',function (\Illuminate\Http\Request $request){
    //获取用户信息
    //判断用户是否为发起人，与携带的发起人openid进行比对。
    //如果是发起人，显示还插几个助力，显示返回活动介绍页面按钮（页面一）
    //如果不是发起人，显示助力成功界面，同时显示抢红包按钮，抢红包按钮退回活动介绍页面，（页面二）
    //如果不是发起人，检测是否是第八个人，如果是，补充显示，您的好友红包已入账。（页面三）


    //判断授权的原则，先看是否是从授权页面过来的，即携带了code，再看是否已授权过

    //如果没有携带code，先判断是否已授权，若已授权，直接进入
    $code = $request -> input('code');
    if($code){
        //进行获取用户信息//获取网页微信Obj
        $webPageObj = new \App\Http\Controllers\WeChat\WebPage();
        //获取用户信息前初始化工作
        $webPageObj -> getAccessTokenAndOpenid($code);
        //得到用户信息,后面交给前端
        $weUserInfo = $webPageObj -> getUserInfo();
        //进入页面
        return "进入页面，已授权1";
    }else{
        //判断是否已授权(已将用户信息保存到session中)，如果没有授权，跳转到授权页面
        $userInfo = session('wechat_web_userinfor');
        if(!$userInfo){
            //不直接进入授权页面，先询问是否为他助力
            return "是否助力";
        }else{
            //直接进入(已在上一页面授权)
        }
    }
});
Route::get('/wechat/get/accesstoken',function (){
   $obj = new \App\Http\Controllers\WeChat\AccessToken();
   $obj -> get();
});
//该路径不可使用ui.checkdata中间件
Route::get('/', function () { return redirect('/index'); });
//两种首页路由，此时开启的是自动寻址模式
//Route::get('/index',['uses' => 'Page\Home@homePage']);
Route::get('/index',['uses' => 'Page\Home@homePage']) -> middleware('ui.tohome');
//主页及页面显示相关路由，使用检查前端数据中间件
Route::group(['middleware' => ['client.visit','ui.checkdata']], function (){
    //分类ID形式访问
    Route::get('/archive/num/{number}',function ($number){
        $archiveObj = new \App\CmsArchive();
        $archiveData = $archiveObj -> where('id',$number) -> first();
        if($archiveData -> running == '0'){
            return "禁止访问";
        }
        if($archiveData){
            $archiveArray = $archiveData -> toArray();
            //查询这个分类下的所有文章
            $obj = new \App\CmsArticle();
            $data = $obj -> where('archive',$archiveData->id) -> where('state','1') -> orderBy('id','desc') -> simplePaginate(10);
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
        $archiveData = $archiveObj -> where('alias',$archiveAlias) -> first();
        if($archiveData -> running == '0'){
            return "禁止访问";
        }
        if($archiveData){
            $archiveArray = $archiveData -> toArray();
            //查询这个分类下的所有文章
            $obj = new \App\CmsArticle();
            $data = $obj -> where('archive',$archiveData->id) -> where('state','1') -> orderBy('id','desc') -> simplePaginate(10);
            $dataListArray = $data -> toArray();
            return view('fanbo/pages/archive',[
                'dataListArray' => $dataListArray,
                'archiveData' => $archiveArray
            ]);
        }else{
            return "不存在的分类";
        }
    });
    //文章访问
    Route::get('/article/{number}',function ($number){
        $articleObj = new \App\CmsArticle();
        $articleData = $articleObj -> find($number);
        if(!$articleData){
            return '文章不存在';
        }
        if($articleData -> state == '0'){
            return '禁止访问文章';
        }
        //推荐文章
        $articleShowArray = $articleObj -> orderBy('id','desc') -> take(10) -> get() -> toArray();
        return view('fanbo/pages/article',[
            'articleData' => $articleData,
            'articleShow' => $articleShowArray
        ]);
    });
    //最新文章
    Route::get('/new_article',function (){
        //查询这个分类下的所有文章
        $archiveArray['title'] = '最新线报';
        $archiveArray['alias'] = 'new';
        $archiveArray['describe'] = '这里收录最新创建的文章';
        $archiveArray['created_at'] = time();
        $archiveArray['updated_at'] = time();
        $obj = new \App\CmsArticle();
        $data = $obj -> where('state','1') -> orderBy('id','desc') -> simplePaginate(10);
        $dataListArray = $data -> toArray();
        return view('fanbo/pages/archive',[
            'dataListArray' => $dataListArray,
            'archiveData' => $archiveArray
        ]);
    });
});
//工具路由
Route::group(['prefix' => 'tool'],function (){
    $this -> post('tongji','Tool\Tongji@visit');
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
        Route::group(['prefix' =>'/cms'],function (){
            //分类
            Route::get('/archive',function (){
                return view('admin/default/page/cms/archive');
            });
            //文章
            Route::get('/article',function (\Illuminate\Http\Request $request){

                //本算法已达到目的，但算法结构产生了冗余，需进行优化-暂时忽略

                //得到要加载的分类信息id
                $archiveId = $request -> input('archiveId');
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
                    $objData = $obj -> orderBy('id','desc') -> get();
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
            Route::get('/article/page',function (\Illuminate\Http\Request $request){
                //得到当前页码及记录条数,以及查询哪个分类
                $data = $request -> only('page','limit','archive');
                //查询数据
            });
            //文章编辑-得到当前文档记录
            Route::post('/article/edit/getdata',function (\Illuminate\Http\Request $request){
                //得到是修改哪个文章
                $articleId = $request -> input('article_id');
                //查询
                $obj = new \App\CmsArticle();
                $data = $obj -> find($articleId) -> toArray();
                if($data){
                    return [
                        'msg' => 'get success',
                        'data' => $data,
                        'time' => date('Y-m-d H:i:s')
                    ];
                }
            });

            //图片
            Route::group(['prefix' =>'/photo'],function (){
                //分类管理
                Route::get('/archive',function (){
                    return view('admin/default/page/cms/photo/archive');
                });


                //图片管理
                Route::get('/list',function (\Illuminate\Http\Request $request){
                    //得到要加载的分类信息id
                    $photoArchiveId = $request -> input('photoArchiveId');
                    if(!$photoArchiveId){
                    //没有指定加载哪个分类
                        $photoArchiveId = 'all';
                    }
                    if($photoArchiveId == 'all'){
                    //当前要访问的分类
                        $thisPhotoArchiveArray = [
                            'id' => 'all',
                            'title' => '所有分类',
                            'describe' => '所有分类',
                            'running' => '1',
                            'acticles' => 'Nah',
                            'created_at' => '0000-00-00 00:00:00',
                            'updated_at' => '0000-00-00 00:00:00'
                        ];
                        $obj = new \App\CmsPhotoItem();
                        $objData = $obj -> orderBy('id','desc') -> get();
                        if($objData){
                            $photosArray = $objData -> toArray();
                        }else{
                            $photosArray = null;
                        }
                    }
                    else{
                    //查询要加载的分类情况
                        $obj = new \App\CmsPhotoArchive();
                    //如果是加载默认分类
                        if($photoArchiveId == 'none'){
                    //查询所有分类，并输出第一个
                            $photoArchiveData = $obj -> first();
                        }else{
                            $photoArchiveData = $obj -> find($photoArchiveId);
                        }
                    //如果不存在要加载的分类
                        if($photoArchiveData){
                            $thisPhotoArchiveArray = $photoArchiveData -> toArray();
                        }else{
                            $thisPhotoArchiveArray = null;
                        }
                    //传入一个参数，是当前要访问的分类数据，如果不存在该分类数据（即访问的分类不存在，则返回空）
                    //第二个参数，当前分类中的文章数据
                    //得到第二个参数，查询要访问的分类的文章数据
                        if($thisPhotoArchiveArray){
                            $itemObj = new \App\CmsPhotoItem();
                            $itemObj = $itemObj -> where('archive',$thisPhotoArchiveArray['id']) -> get();
                            if($itemObj){
                                $photosArray = $itemObj -> toArray();
                            }else{
                                $photosArray = null;
                            }
                        }else{
                            $photosArray = null;
                        }
                    }

                    //得到所有分类
                    $photoArchiveObj = new \App\CmsPhotoArchive();
                    $photoArchiveData = $photoArchiveObj -> get();
                    if($photoArchiveData){
                        $photoArchiveListArray = $photoArchiveData -> toArray();
                    //追加一个分类,所有分类
                        array_unshift($photoArchiveListArray,[
                            'id' => 'all',
                            'title' => '所有分类',
                            'describe' => '所有分类',
                            'running' => '1',
                            'photos' => 'Nah',
                            'created_at' => '0000-00-00 00:00:00',
                            'updated_at' => '0000-00-00 00:00:00'
                        ]);
                    }else{
                        $photoArchiveListArray = null;
                    }
                    return view('admin/default/page/cms/photo/photo',[
                    //当前选择的分类的数据，如果值为null，有两种可能
                    //1、当前访问的分类不存在
                    //2、还没有创建任何分类
                    //解决方案，在输出内容前，先判断是否存在分类
                        'thisPhotoArchiveArray' => $thisPhotoArchiveArray,
                    //当前分类下的图片内容
                        'photosArray' => $photosArray,
                    //所有图片分类
                        'photoArchiveListArray' => $photoArchiveListArray
                    ]);
                });
            });
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
                //编辑
                Route::post('/edit','Admin\CmsArticleController@edit');
            });
            Route::group(['prefix' => 'photo'],function (){
                //修改图片描述
                Route::post('/describe/change',function (\Illuminate\Http\Request $request){
                    $data['time'] = date('Y-m-d H:i:s');
                    $value = $request -> only('photoId','describe');
                    $obj = new \App\CmsPhotoItem();
                    $obj = $obj -> find($value['photoId']);
                    $obj -> describe = $value['describe'];
                    $ret = $obj -> save();
                    if($ret){
                        $data['msg'] = 'change success';
                    }else{
                        $data['msg'] = 'change fail';
                    }
                    return $data;
                });
                //上传
                Route::post('/upload',function (\Illuminate\Http\Request $request){
                    $data['time'] = date('Y-m-d H:i:s');
                    $photoArchiveValue = $request -> input('photoArchiveValue');
                    if($photoArchiveValue == 'none'){
                        $data['msg'] = 'please select photo archive';
                        return $data;
                    }
                    if ((($_FILES["file"]["type"] == "image/gif")
                            || ($_FILES["file"]["type"] == "image/jpeg")
                            || ($_FILES["file"]["type"] == "image/pjpeg")
                            || ($_FILES["file"]["type"] == "image/png")
                        )
                        && ($_FILES["file"]["size"] < 1024*1024*2))
                    {
                        if ($_FILES["file"]["error"] > 0)
                        {
                            $data['error'] = "Return Code: " . $_FILES["file"]["error"] . "<br />";
                        }
                        //得到文件后缀名
                        $type = substr($_FILES['file']['name'], strrpos($_FILES['file']['name'], '.')+1);
//                        dump($type);
                    }
                    else
                    {
                       return  $data['msg'] = "Invalid file";
                    }
                    //量级：图片应为十万级，但一次只读最新的，所以还是需要放入数据库，好进行排列
                    //写入数据库，使用id记录对应的路径。
                    \Illuminate\Support\Facades\DB::beginTransaction();
                    $obj = new \App\CmsPhotoItem();
                    $obj -> archive = $photoArchiveValue;
                    //路径是/uploadImg/月份/id.type
                    $path ='uploadImg/';
                    $obj -> path = $path;
                    $obj -> save();
                    $path = 'uploadImg/'.date('Y-m').'/'.$obj->id.'.'.$type;
                    $obj -> path = '/'.$path;
                    $obj -> save();
                    if (file_exists($path))
                    {
                        $data['msg'] = 'create already exists';
                        $data['error'] = $_FILES["file"]["name"] . " already exists. ";
                    }
                    else
                    {
                        if(!file_exists('uploadImg/'.date('Y-m'))){
                            mkdir('uploadImg/'.date('Y-m'),0777,true);
                        }
                        move_uploaded_file($_FILES["file"]["tmp_name"],
                            $path);
                        if (file_exists($path))
                        {
                            \Illuminate\Support\Facades\DB::commit();
                            $data['msg'] = 'create success';
                        }else{
                            \Illuminate\Support\Facades\DB::rollBack();
                            $data['msg'] = 'created fail';
                            $data['error'] = 'write file fail';
                        }
                    }
                    return $data;
                });
                Route::post('/del',function (\Illuminate\Http\Request $request){
                    \Illuminate\Support\Facades\DB::beginTransaction();
                    $data['time'] = date('Y-m-d H:i:s');
                    $id = $request -> input('id');
                    $obj = new \App\CmsPhotoItem();
                    $objRes = $obj -> find($id);

//                    dump($objRes -> path);
                    if(!$objRes){
                        $data['msg'] = 'photo not find';
                        return $data;
                    }
                    //得到路径
                    $path = substr($objRes -> path,1);
                    //删除记录
                    $objRes -> delete();
                    //删除图片
                    $ret = unlink($path);
                    if($ret){
                        \Illuminate\Support\Facades\DB::commit();
                        $data['msg'] = 'photo delete success';
                    }else{
                        \Illuminate\Support\Facades\DB::rollBack();
                        $data['msg'] = 'photo delete fail';
                    }
                    return $data;
                });
            });
            Route::group(['prefix' => 'photo'],function (){
                //图片分类
                Route::group(['prefix' => 'archive'],function (){
                    //新建
                    Route::post('/create','Admin\CmsPhotoArchiveController@create');
                    //删除
                    Route::post('/del','Admin\CmsPhotoArchiveController@delList');
                    //更改
                    Route::post('/change','Admin\CmsPhotoArchiveController@update');
                });
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