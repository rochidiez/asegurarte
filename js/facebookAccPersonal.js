window.fbAsyncInit = function() {
	FB.init({
		appId : '593165004128715',
		xfbml : true,
		version : 'v2.2'
	});
};

// Load the SDK asynchronously
(function(d, s, id) {
	var js, fjs = d.getElementsByTagName(s)[0];
	if (d.getElementById(id))
		return;
	js = d.createElement(s);
	js.id = id;
	js.src = "//connect.facebook.net/es_LA/sdk.js";
	fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));

// Utilizado en el objeto fb:login-button dentro del evento onlogin, la función
// statusChangeCallback debe ser construida por Ud.
function checkLoginState() {
	FB.getLoginStatus(function(response) {
		statusChangeCallback(response);
	});
}
