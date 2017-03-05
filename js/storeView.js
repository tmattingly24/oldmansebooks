$(document).ready(function () {
    
   var storeMain = document.getElementById('storeMain');
    if (storeMain === null){
        
    } else {
     
        initStore();
        
    }
    
});

function initStore(){
    
  var http = new XMLHttpRequest();
    var url = "initStore.php";
    http.open("POST", url, true);

    //Send the proper header information along with the request
    http.setRequestHeader("Content-type", "application/x-www-form-urlencoded");


    http.onreadystatechange = function () { //Call a function when the state changes.


        if (http.readyState == 4 && http.status == 200) {
            
            alert(http.responseText);
        
        }
    }
    
    var results = 1;
    http.send("resultsPer=" + results);

}
    
    
