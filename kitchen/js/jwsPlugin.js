jws.jwsPlugin = {
    // if namespace is changed update server plug-in accordingly!
    NS: "com.anit.jWebSocket.plugins.pos",
    TYPE_SERVER: "server",
    TYPE_CASHIER: "cashier",
    TYPE_WAITER: "waiter",
    TYPE_KITCHEN: "kitchen",
    FLAG_REFRESH_KITCHEN: "refreshKitchen",
    FLAG_REGISTER: "register",
    FLAG_UNREGISTER: "unregister",
    FLAG_BROADCAST: "broadcast",
    FLAG_ORDER_FINISHED: "orderFinished",
    FLAG_PRODUCT_FINISHED: "productFinished",
	//Method is called when a token has to be progressed
    processToken: function( aToken ,aEvent) {
      if (aToken) {
        if(aToken.ns === jws.jwsPlugin.NS) {
          if(aToken.type === jws.jwsPlugin.TYPE_SERVER && aToken.flag === jws.jwsPlugin.FLAG_REFRESH_KITCHEN){
            var reload_link = "";
            var sort_by_time=2;
            var sort_by_product=1;
            if(sessionStorage.sort_type == sort_by_time){
              reload_link = "php/content_time_sort.php";
            }else{
              reload_link = "php/content_product_sort.php";
            }
            ajaxLoadPage(reload_link);
          }
        }
      }
    },

	onFinishOrder: function(user_id, order_id, message ) {
		if( this.isConnected() ) {
      console.log("sending request for:"+message);
		  this.sendToken({
        ns: jws.jwsPlugin.NS,
        type: jws.jwsPlugin.TYPE_KITCHEN,
        flag: jws.jwsPlugin.FLAG_ORDER_FINISHED,
        data: order_id,
        msg: message
      });//send it
		}

	},
  register: function(user_name,password) {
		if( this.isConnected() ) {
      console.log("Login:"+user_name);
			this.sendToken({
				ns: jws.jwsPlugin.NS,
        type: jws.jwsPlugin.TYPE_KITCHEN,
        flag: jws.jwsPlugin.FLAG_REGISTER,
				user_name: user_name,
				password: password
			});
		}

	},

	onFinishProduct: function(user_id, product_id, message) {
		if( this.isConnected() ) {
		  console.log("sending request for:"+this.checkConnected().code);
		  this.sendToken( {
        ns: jws.jwsPlugin.NS,
        type: jws.jwsPlugin.TYPE_KITCHEN,
        flag: jws.jwsPlugin.FLAG_ORDER_FINISHED,
        data: product_id,
        msg: message
      });//send it
		}
	}
}

//add the client PlugIn
jws.oop.addPlugIn( jws.jWebSocketTokenClient, jws.jwsPlugin );
