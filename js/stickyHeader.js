$(window).scroll(function() {
  
    if ($(this).scrollTop() > 50) { //use `this`, not `document`
        $('#box').fadeOut();
       
        
    } else if ($(this).scrollTop() < 100) {
         $('#box').fadeIn();
    }
});

