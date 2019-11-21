window.onload = function() {

	document.getElementById("lookupb").onclick =function(){list(0)};
	document.getElementById("lookupc").onclick =function(){list(1)};
	function list(cities){
		var str = document.getElementById("country").value;
		var xhttp = new XMLHttpRequest();
		var url = "world.php";
 		xhttp.onreadystatechange = function() {
    		if (xhttp.readyState === xhttp.DONE) {
 				if (xhttp.status === 200) {
 					document.getElementById("result").innerHTML='Hey';
 					var response = xhttp.responseText;
 					document.getElementById("result").innerHTML=response;
 				} else {
 					alert('There was a problem with the request. \n'+xhttp.status);
 				}
			} 
  		};
  		xhttp.open("GET", url+"?country="+str+"&context="+cities ,true);
  		xhttp.send();
	}

}