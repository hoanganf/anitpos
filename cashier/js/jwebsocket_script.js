var websocketID = "com.anit.smartpos";
var websocketClient = null;

//Method is called when the page is loaded
function initPage() {
	// check if WebSockets are supported by the browser
	if( jws.browserSupportsWebSockets() ) {
		console.log("Websockets are supported");
		// instaniate new TokenClient, either JSON, CSV or XML
		websocketClient = new jws.jWebSocketJSONClient();
		websocketClient.setReliabilityOptions(jws.RO_ON);
		logon(wsUsername,wsPassword);//call the logon Method
	} else {
		console.log("Websockets are NOT supported");
	}
}
function exitPage() {
	// this allows the server to release the current session
	// immediately w/o waiting on the timeout.
	if( websocketClient ) {
		websocketClient.close({
			// force immediate client side disconnect
			timeout: 0
		});
	}
}
//Method is called when the user clicks the "check" button
//function finished(user_id, table_name, zone, food_name){
//	console.log(user_id+" "+table_name+" "+zone+" "+food_name);
//	//websocketClient.onFinished(myOrder);//call the order method from LauridsClientPlugIn.js
//}

function logon(wsUsername,wsPassword) {
	var wsURL = jws.getDefaultServerURL();// get the default server url
	//wsURL="ws://sdc.eduportal.vn:8787/jWebSocket/jWebSocket";
	console.log("Connecting to " + wsURL +"..." );

	//get the guest username and password
	if(wsUsername==null) wsUsername=jws.GUEST_USER_LOGINNAME;
  if(wsPassword==null) wsPassword=jws.GUEST_USER_PASSWORD;
	if (websocketClient.isConnected()) {
		log("Already connected.");
		return;
	}
	// try to establish the connection to jWebSocket server
	websocketClient.logon( wsURL, wsUsername, wsPassword,{
		// connection timeout in ms
		openTimeout: 3000,
		OnLogon: function(aToken) {
			// Sending a register token to the server

		},
		// OnReconnecting callback
		OnReconnecting: function( aEvent ) {
			console.log( "Re-establishing jWebSocket connection..." );
		},

		OnOpen: function( aEvent ) {
			console.log("Connection to " + websocketID + " established." );
			changeStatusButton(true);
			websocketClient.register(wsUsername,wsPassword);
		},
		// OnMessage callback
		OnMessage: function( aEvent, aToken ) {
			console.log(websocketClient.getId()+"|"+( aToken ? aToken.type : "-" ) + ": " +	aEvent.data);
			websocketClient.processToken(aEvent,aToken);

		},
		// OnClose callback
		OnClose: function( aEvent ) {
			changeStatusButton(false);
			console.log("Disconnected from " + websocketID + ".");
		}

	});
}
function changeStatusButton(isConnected){
	var imgStatus=document.getElementById("status");
	if(isConnected){
		imgStatus.style.backgroundColor="GREEN";
	}else{
		imgStatus.style.backgroundColor="RED";
	}
};
