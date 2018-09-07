@inject('request', 'Illuminate\Http\Request')
<!-- Left side column. contains the sidebar -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <ul class="sidebar-menu">

            <li class="{{ $request->segment(1) == 'home' ? 'active' : '' }}">
                <a href="{{ url('/') }}">
                    <i class="fa fa-wrench"></i>
                    <span class="title">@lang('global.app_dashboard')</span>
                </a>
            </li>

            {{--目录管理--}}
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-users"></i>
                    <span class="title">目录管理</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">

                    <li class="{{ ($request->segment(3) == 'menu')&&($request->segment(4) == 'create') ? 'active active-sub' : '' }}">
                        <a href="/admin/cms/menu/create">
                            <i class="fa fa-briefcase"></i>
                            <span class="title">
                                创建目录
                            </span>
                        </a>
                    </li>
                    <li class="{{ $request->segment(2) == 'menuList' ? 'active active-sub' : '' }}">
                        <a href="/admin/cms/menu/list">
                            <i class="fa fa-briefcase"></i>
                            <span class="title">
                                我的目录
                            </span>
                        </a>
                    </li>

                </ul>
            </li>

            {{--文章分类--}}
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-users"></i>
                    <span class="title">@lang('global.menu.archive.title')</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">

                    <li class="{{ ($request->segment(3) == 'archive')&&($request -> segment(4) == 'create') ? 'active active-sub' : '' }}">
                        <a href="@lang('global.menu.archive.create.h')">
                            <i class="fa fa-briefcase"></i>
                            <span class="title">
                                @lang('global.menu.archive.create.t')
                            </span>
                        </a>
                    </li>
                    <li class="{{ ($request->segment(3) == 'archive')&&($request -> segment(4) == 'list') ? 'active active-sub' : '' }}">
                        <a href="@lang('global.menu.archive.list.h')">
                            <i class="fa fa-briefcase"></i>
                            <span class="title">
                                @lang('global.menu.archive.list.t')
                            </span>
                        </a>
                    </li>

                </ul>
            </li>

            {{--我的文章--}}
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-users"></i>
                    <span class="title">我的文章</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">

                    <li class="{{ $request->segment(2) == 'permissions' ? 'active active-sub' : '' }}">
                        <a href="/admin/cms/article/create">
                            <i class="fa fa-briefcase"></i>
                            <span class="title">
                                创建文章
                            </span>
                        </a>
                    </li>
                    <li class="{{ $request->segment(2) == 'roles' ? 'active active-sub' : '' }}">
                        <a href="{{ route('admin.roles.index') }}">
                            <i class="fa fa-briefcase"></i>
                            <span class="title">
                                文章列表
                            </span>
                        </a>
                    </li>

                </ul>
            </li>


            @can('users_manage')
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-users"></i>
                    <span class="title">@lang('global.user-management.title')</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">

                    <li class="{{ $request->segment(2) == 'permissions' ? 'active active-sub' : '' }}">
                        <a href="{{ route('admin.permissions.index') }}">
                            <i class="fa fa-briefcase"></i>
                            <span class="title">
                                @lang('global.permissions.title')
                            </span>
                        </a>
                    </li>
                    <li class="{{ $request->segment(2) == 'roles' ? 'active active-sub' : '' }}">
                        <a href="{{ route('admin.roles.index') }}">
                            <i class="fa fa-briefcase"></i>
                            <span class="title">
                                @lang('global.roles.title')
                            </span>
                        </a>
                    </li>
                    <li class="{{ $request->segment(2) == 'users' ? 'active active-sub' : '' }}">
                        <a href="{{ route('admin.users.index') }}">
                            <i class="fa fa-user"></i>
                            <span class="title">
                                @lang('global.users.title')
                            </span>
                        </a>
                    </li>
                </ul>
            </li>
            @endcan

            <li class="{{ $request->segment(1) == 'change_password' ? 'active' : '' }}">
                <a href="{{ route('auth.change_password') }}">
                    <i class="fa fa-key"></i>
                    <span class="title">更改密码</span>
                </a>
            </li>

            <li>
                <a href="#logout" onclick="$('#logout').submit();">
                    <i class="fa fa-arrow-left"></i>
                    <span class="title">@lang('global.app_logout')</span>
                </a>
            </li>
        </ul>
    </section>
</aside>
{!! Form::open(['route' => 'auth.logout', 'style' => 'display:none;', 'id' => 'logout']) !!}
<button type="submit">@lang('global.logout')</button>
{!! Form::close() !!}
