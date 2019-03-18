Page({
  data: {
  	movie:{}
  },
  onLoad: function(movie_id){
  	var that = this;
  		wx.request({
  			url:'https://douban.uieee.com/v2/movie/' + movie_id.id ,
  			data:{},
  			header:{
  				'content-type': 'json'
  			},
  			success:function(res){
  				wx.hideToast();
  				console.log(res.data);
  				that.setData({
  					movie:res.data
  				});
 
  			}
  		})

  }
})
