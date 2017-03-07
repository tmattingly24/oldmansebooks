$(document).ready(function () {
    
    
   $('#storeLink').click(function(event) {
    event.preventDefault();
    fireNav("storeView");
   });
    
   $('#loginLink').click(function(event) {
    event.preventDefault();
    fireNav("loginView");
   });
    
   $('#investLink').click(function(event) {
    event.preventDefault();
    fireNav("investView");
   });
    
   $('#aboutLink').click(function(event) {
    event.preventDefault();
    fireNav("aboutView");
   });
    
   $('#faqLink').click(function(event) {
    event.preventDefault();
    fireNav("faqView");
   });
   
   $('#sellLink').click(function(event) {
    event.preventDefault();
    fireNav("sellView");
   });
    
});


function fireNav(where){
    
     var http = new XMLHttpRequest();
     var url = "navigator.php";
     http.open("POST", url, true);
        
    http.setRequestHeader("Content-type", "application/x-www-form-urlencoded");


    http.onreadystatechange = function () { //Call a function when the state changes.


        if (http.readyState == 4 && http.status == 200) {
            
            
            $('#view').html(http.responseText);
             

        }
    }
    
   
    
    http.send("where=" + where);
}

