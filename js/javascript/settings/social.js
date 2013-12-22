if ($('.box-big .box-socials').is('*')) {
	// Add div necessary for facebook like to work
	$('body').prepend('<div id="fb-root"></div>');
	// Asynchronous loading of socials...
	(function(w, d, s) {
	  function go(){
	  var js, fjs = d.getElementsByTagName(s)[0], load = function(url, id) {
	  if (d.getElementById(id)) {return;}
		js = d.createElement(s); js.src = url; js.id = id;
		fjs.parentNode.insertBefore(js, fjs);
	  };
	  load('//connect.facebook.net/en_US/all.js#xfbml=1&status=0', 'fbjssdk');
	  load('//apis.google.com/js/plusone.js', 'gplus1js');
	  load('//platform.twitter.com/widgets.js', 'tweetjs');
	 }
	 if (w.addEventListener) { w.addEventListener('load', go, false); }
	  else if (w.attachEvent) { w.attachEvent('onload',go); }
	 }(window, document, 'script'));	
}	