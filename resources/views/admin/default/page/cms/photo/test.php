<?php
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
