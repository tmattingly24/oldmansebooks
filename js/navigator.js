$(document).ready(function () {

    
	
});


function fireNav(where){
    
     var http = new XMLHttpRequest();
     var url = "navigator.php";
     http.open("POST", url, true);
        
    http.setRequestHeader("Content-type", "application/x-www-form-urlencoded");


    http.onreadystatechange = function () { 

        if (http.readyState == 4 && http.status == 200) {
            
            
            $('#view').html(http.responseText);
			
        }
    }
    
   
    
    http.send("where=" + where);
}



function getViewByUrl(targetUrl){
	
	 var http = new XMLHttpRequest();
     var url = "navigator.php";
     http.open("POST", url, true);
        
    http.setRequestHeader("Content-type", "application/x-www-form-urlencoded");


    http.onreadystatechange = function () { 

        if (http.readyState == 4 && http.status == 200) {
            
            
			window.location.href = targetUrl;
			
        }
    }
    
   
    
    http.send("where=" + targetUrl);
	
}
