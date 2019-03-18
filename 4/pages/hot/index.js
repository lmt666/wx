Page({
  data: {
      title:"loading..."
  },
  onLoad: function(){
    var that = this;
    wx.showToast({
      title:"loading...",
      icon:"loading",
      duration:10000
    });
    wx.request({
      url:'https://douban.uieee.com/v2/movie/top250?start=0&count=250',
      data:{},
      header:{
        'content-type': 'json'
      },
      success:function(res){
        wx.hideToast();
        console.log(res.data);
        that.setData({
          title:"经典电影",          
          movies:res.data.subjects
        })
      }
    })
  }
  
})
