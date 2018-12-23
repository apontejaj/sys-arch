// Initialize your app
var myApp = new Framework7();

// Export selectors engine
var $$ = Dom7;

// Add views
var view1 = myApp.addView('#view-1');

function log(){

	var welcome = "Well done!";
	var username = document.getElementById('username').value;
	var password = document.getElementById('password').value;
	
	var url = "http://www.apontejaj.com/sys-arch/API/db.php?un=" +username+ "&pw=" +password;
	document.getElementById('status').innerHTML = url;

	console.log(url);

	$$.getJSON(url, function( data ) {
	
		var name = data.name;
		document.getElementById('status').innerHTML = "welcome <br>" + name;
			
	});

}
function refresh(){
	location.reload();
	
}
