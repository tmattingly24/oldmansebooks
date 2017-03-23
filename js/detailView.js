$(document).ready(function () {
	
	
	var title = document.title;
	getDetail(title);
	
	
});


function getDetail(title){
    
  var http = new XMLHttpRequest();
    var url = "../getDetail.php";
    http.open("POST", url, true);

    //Send the proper header information along with the request
    http.setRequestHeader("Content-type", "application/x-www-form-urlencoded");


    http.onreadystatechange = function () { //Call a function when the state changes.


        if (http.readyState == 4 && http.status == 200) {
            
			
            $('#detailMain').append(http.responseText);
			loaded();
        }
    }
    
    
    http.send("title="+title);

}

function loaded(){
	
	 $(function () {
				
     			$('img').each(function (i, e) {
     				$(e).attr('src', '../' + $(e).attr('src'));
     			});
     		});
	
	 $('.underImg').click(function (e) {
            
        scrollPhotos(e);

    });
	
	$('#cartBtn').click(function (e) {
		
		
		addToCart(e);
		
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

	function addToCart(e) {
		
		var value = document.getElementById('aboveCart');
		var num = parseInt(value.innerHTML);
		num+=1;
		value.innerHTML = num;
	}