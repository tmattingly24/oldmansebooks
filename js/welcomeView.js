$(document).ready(function () {
	
	
	
	if($('#welcomeMain').innerHTML == undefined){
		
			
			grabRandom(1);
		
	}
	
	
});


function grabRandom(num){
	
	var http = new XMLHttpRequest();
    var url = "randBook.php";
    http.open("POST", url, true);

    //Send the proper header information along with the request
    http.setRequestHeader("Content-type", "application/x-www-form-urlencoded");


    http.onreadystatechange = function () { //Call a function when the state changes.


        if (http.readyState == 4 && http.status == 200) {
            
           // $('.cell').append(http.responseText);
			appendToBlank(http.responseText);
			num++;
			if(num <= 21){
				
				grabRandom(num);	
			}
			
        }
    }
    
    
    http.send("foo=bar");
	
}


function appendToBlank(response){
	
	var cells = document.getElementsByClassName("cell");
	console.log(cells);
	
	for(var i = 0; i < cells.length; i++)
	{

  		if(cells[i].innerHTML ==""){
		
			cells[i].innerHTML = response;
			break;
		}
	
	}
	
}