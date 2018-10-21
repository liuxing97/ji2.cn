const baseURL = '';// 自己后台API地址
var layer = undefined;
var http = {
    request: function (url,type,data) {
        var resType = 'json';
        if(type === 'getpage'){
            type = 'get';
            resType = 'str';
        }
        var time = Date.now();
        console.log('开始:'+time);
        return new Promise(function (resolve, reject){
          $.ajax({
              url: url,
              type:type,
              data:data,
              dataType: 'json',
              headers: {
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              },
              complete: function (xhr) {
                  console.log('请求:'+url);
                  console.log('耗时:'+Date.now()-time);
                  console.log('返回数据为：');
                  console.log(xhr.responseJSON);
                  // console.log(xhr)
                  if (xhr.status >= 200 && xhr.status < 300) {
                      if(resType !== 'json'){
                          resolve(xhr.responseText);
                      }else{
                          resolve(xhr.responseJSON)
                      }
                  } else {
                      reject(xhr)
                  }
              }
          });
        })
    },
    post: function (url,data) {
        layui.use('layer', function(){
            layer = layui.layer;
            layer.open({
                skin:'httpLoading-class',
                type:1,
                area:['300px','200px'],
                closeBtn:0,
                shade: 0.86,
                title:false,
                content:$('#httpLoading')
            })
        });
      return this.request(url,'post',data)
    },
    get: function (url,data) {
        return this.request(url,'get',data)
    },
    getPage: function (url,data) {
        layui.use('layer', function(){
            layer = layui.layer;
            layer.open({
                skin:'httpLoading-class',
                type:1,
                area:['300px','200px'],
                closeBtn:0,
                shade: 0.86,
                title:false,
                content:$('#httpPageLoading')
            })
        });
        return this.request(url,'getpage',data)
    },
    hidePost: function (url,data){
        return this.request(url,'post',data)
    }
};
