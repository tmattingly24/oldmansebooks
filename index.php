 <?php if(!isset($view)): $view = "storeView"?>
    
            <?php endif; ?>

<!DOCTYPE html>
    <html lang='en'>
       
        <?php include("includes/head.php") ; ?> 
       
    <body>
        <?php include("includes/header.php") ; ?>
            
        <div id = "view">  <?php include("includes/views/$view.php") ; ?> </div>
        
        <?php include("includes/footer.php") ?>
    </body>

    </html>
	