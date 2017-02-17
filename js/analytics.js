(function () {
    
    
    document.onreadystatechange = function () {
        
        var readyState = document.readyState;
        
        if (readyState == "interactive") {
            
            var usrAgnt = navigator.userAgent
            console.log("user agent string " + usrAgnt)
            
            $.getJSON('//gd.geobytes.com/GetCityDetails?callback=?', function (data) {
                console.log(JSON.stringify(data, null, 2));
            });
            
        }
    }
    
    
})();