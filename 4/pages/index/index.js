Page({
  data: {
      title:'loading...'

  },
  onLoad: function(){
    var that = this;
    wx.showToast({
      title:"loading...",
      icon:"loading",
      duration:1000
    });
    wx.request({
      url:'https://douban.uieee.com/v2/movie/in_theaters?city=杭州&start=0&count=25',
      data:{},
      header:{
        'content-type': 'json'
      },
      success:function(res){
        wx.hideToast();
        console.log(res.data);
        that.setData({
          title:"热映中...",          
          movies:res.data.subjects
        });

      }
    })
  }
  
})
