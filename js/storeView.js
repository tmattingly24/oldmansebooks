$(document).ready(function () {
    
   var storeMain = document.getElementById('storeMain');
    
    if (storeMain === null){
        
    } else {
        
       initStore($('#numResults').val());
    }
    
    $("#numResults").change(function (){
            
            initStore($(this).val());
    });
    
});

function getBook(offset, max){
    
  var http = new XMLHttpRequest();
    var url = "initStore.php";
    http.open("POST", url, true);

    //Send the proper header information along with the request
    http.setRequestHeader("Content-type", "application/x-www-form-urlencoded");


    http.onreadystatechange = function () { //Call a function when the state changes.


        if (http.readyState == 4 && http.status == 200) {
            
            $('#storeMain').append(http.responseText);
            if(offset == max-1){
             
                storeLoaded();
                
            }

        }
    }
    
    
    http.send("offset=" + 1);

}
    
function initStore(numResults){
    
    for(var i = 0; i < numResults; i++){
        
        if(i==0){
            
             $('#storeMain').empty();
            
        }
        getBook(i, numResults);
        window.scrollTo(0,0);
           
    }
        
}



function storeLoaded() {

    $('.underImg').click(function (e) {
            
        scrollPhotos(e);

    });

}

function scrollPhotos(e){
   
    
    var what = e.target.getAttribute('src');
    var photos = [];  
    
        if (what != null) {
            
            var div = e.target.parentElement.parentElement;
            
            for(var i = 0; i < div.childElementCount; i++) {
                
                   if(div.children[i].className=="listImg photo-frame"){
                       
                      currentImg = div.children[i];
                      photos.push(currentImg);
                    
                   }
                    
                if(div.children[i].className=="listImg photo-frame hidden"){
                        
                       photos.push(div.children[i]);
                }
                
                    
            }
            
            var currentIndex = photos.indexOf(currentImg);
            
            if(what.indexOf("right")!=-1 && photos[currentIndex+1] != undefined){
                    
              
                    $(photos[currentIndex]).toggleClass("hidden");
                    $(photos[currentIndex+1]).toggleClass("hidden");
               
                    
            }
            
            if(what.indexOf("right")!=-1 && photos[currentIndex+1] == undefined){
              
                    $(photos[currentIndex]).toggleClass("hidden");
                    $(photos[0]).toggleClass("hidden");
                   
            }
            
             if(what.indexOf("left")!=-1 && photos[currentIndex-1] != undefined){
              
                    $(photos[currentIndex]).toggleClass("hidden");
                    $(photos[currentIndex-1]).toggleClass("hidden");
                   
            }
            
            if(what.indexOf("left")!=-1 && photos[currentIndex-1] == undefined){
               
                    $(photos[currentIndex]).toggleClass("hidden");
                    $(photos[photos.length-1]).toggleClass("hidden");
                   
            }
        }
    
}