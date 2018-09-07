@extends('layouts.app')
@section('content')
    <style>
        .pageContent .tips{
            margin-top: 4rem;
            line-height: 6rem;
            padding-left: 4rem;
            border-left: 4px solid #e5e5e5;
            background: rgba(255,255,255,0.66);
            color: #9a9a9a;
            margin-bottom: 3.6rem;
        }
        .proMenu{
            /*margin-bottom: 20rem;*/
        }
        .proMenu a{

        }
        .proMenu .menuItem{
            margin-top: 2rem;

            padding-left: 4rem;

            border-left: 4px solid;

            line-height: 4rem;

            letter-spacing: 3px;
        }
        .btn-post-tijiao{
            margin-left: 0 !important;
            margin-bottom: 12rem;
        }
    </style>
    <div class="pageHeader">
        <h3 class="page-title">@lang('global.menu.menu.create.t')</h3>
        <div class="tips">* 点击应用，即可切换目录。<br />* 如果您是开发人员，请根据菜单ID调用菜单数据。</div>
    </div>
    <div class="pageContent">
        @foreach($dataList as $item)
            <div class="">
                @php
                    $item = json_decode($item['menu']);
                    dump($item);
                @endphp
            </div>
            @endforeach
    </div>
@stop
@section('js')
    <script src="/adminlte/js/pages/menu.js"></script>
@stop