const baseURL = '';// 自己后台API地址
var http = {
    request: function (url,type,data) {
        var time = Date.now();
        console.log('开始:'+time);
        return new Promise(function (resolve, reject){
          $.ajax({
              url: url,
              type:type,
              data:data,
              dataType: 'json',
              headers: {
                  'X-CSRF-TOKEN': window._token
              },
              complete: function (xhr) {
                  loading.hide();
                  console.log('请求:'+url);
                  console.log('耗时:'+Date.now()-time);
                  console.log('返回数据为：');
                  console.log(xhr.responseJSON);
                  // console.log(xhr)
                  if (xhr.status >= 200 && xhr.status < 300) {
                      resolve(xhr.responseJSON)
                  } else {
                      reject(xhr)
                  }
              }
          });
        })
    },
    post: function (url,data) {
      return this.request(url,'post',data)
    },
    get: function (url,data) {
        return this.request(url,'get',data)
    }
};
