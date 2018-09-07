const baseURL = 'https://kindergarten.censng.com' // 自己后台API地址
const http = ({ url = '', params = {}, ...other } = {}) => {
  wx.showLoading({
    title: '加载中...'
  })
  let time = Date.now()
  console.log(`开始:${time}`)
  return new Promise((resolve, reject) => {
    wx.request({
      url: getUrl(url),
      data: params,
      header: getHeader(),
      ...other,
      complete: (res) => {
        wx.stopPullDownRefresh();
        wx.hideLoading();
        console.log('请求:'+url);
        console.log(`耗时:${Date.now() - time}`);
        console.log('返回数据为：');
        console.log(res);
        if (res.statusCode >= 200 && res.statusCode < 300) {
          resolve(res.data)
        } else {
          reject(res)
        }
      }
    })
  })
}
const getUrl = url => {
  if (url.indexOf('://') == -1) {
    url = baseURL + url
  }
  return url
}
const getHeader = () => {
  try {
    var sessionid = wx.getStorageSync('sessionid')
    if (sessionid) {
      return { 'Cookie': 'laravel_session='+sessionid }
    }
    return {}
  } catch (e) {
    return {}
  }
}
module.exports = {
  baseURL,
  get(url, params = {}) {
    
    return http({
      url,
      params
    })
  },
  post(url, params = {}) {
    return http({
      url,
      params,
      method: 'post'
    })
  },
  put(url, params = {}) {
    return http({
      url,
      params,
      method: 'put'
    })
  },
  // 这里不能使用 delete, delete为关键字段
  myDelete(url, params = {}) {
    return http({
      url,
      params,
      method: 'delete'
    })
  },
  resError (msg = '您的网络出现异常了哦~') {
    wx.showToast({
      title: msg,
      icon: 'none'
    })
  },
  resSuccess (str = '请求成功') {
    wx.showToast({
      title: str,
      icon: 'success'
    })
  }
}