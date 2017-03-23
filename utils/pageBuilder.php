<?php


function buildWelcomePage() {
	
$head = '<head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Welcome to Old Manse Books</title>
        <script src="https://code.jquery.com/jquery-3.1.1.min.js" integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8=" crossorigin="anonymous"></script>
        <script type="text/javascript" src="js/analytics.js"></script>
	 	<script type="text/javascript" src="js/welcomeView.js"></script>
        <meta name="description" content="Old Manse Books is a one stop online book marketplace. We are still in the pre-revenue stages, building our site, adding inventory and seeking investors. Stay tuned for more updates" />
        <meta name="keywords" content="books, new books, used books, buy books, sell your books, store, retailer, bookstore" />
        <meta name="author" content="Tim Mattingly" />
        <link rel="stylesheet" href="css/global.css" />
        <link rel="stylesheet" href="css/investView.css" />
        <link rel="stylesheet" href="css/footer.css" />
        <link rel="stylesheet" href="css/header.css" />
        <link rel="stylesheet" href="css/reset.css" />
	 	<link rel="stylesheet" href="css/welcome.css" />
        <link rel="shortcut icon" type="image/x-icon" href="favicon.ico" />
        <link href="https://fonts.googleapis.com/css?family=Rye" rel="stylesheet" />
        <link href="https://fonts.googleapis.com/css?family=Bungee" rel="stylesheet"> 
        <link href="https://fonts.googleapis.com/css?family=Slabo+27px" rel="stylesheet">
        
</head>';
	
$view = 'welcomeView';
$footer = file_get_contents('includes/footer.php');
$header = file_get_contents('includes/header.php');
$viewPage = file_get_contents('includes/views/'.$view.'.php');
$page = '<!DOCTYPE html>
    <html lang=\'en\'>
       
        '.$head.'
       
    <body>
        
		'.$header.'
            
        <div id = "view">'.$viewPage.'</div>
        
        '.$footer.'
    </body>

    </html>';
	
	echo $page;
	
}

function buildInvestPage() {

	$head = '<head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Join Us on Our Journey!</title>
        <script src="https://code.jquery.com/jquery-3.1.1.min.js" integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8=" crossorigin="anonymous"></script>
        <script type="text/javascript" src="js/analytics.js"></script>
	 	 <script type="text/javascript" src="js/investView.js"></script>
        <meta name="description" content="Old Manse Books is a one stop online book marketplace. We are still in the pre-revenue stages, building our site, adding inventory and seeking investors. Stay tuned for more updates" />
        <meta name="keywords" content="books, new books, used books, buy books, sell your books, store, retailer, bookstore" />
        <meta name="author" content="Tim Mattingly" />
        <link rel="stylesheet" href="css/global.css" />
        <link rel="stylesheet" href="css/investView.css" />
        <link rel="stylesheet" href="css/footer.css" />
        <link rel="stylesheet" href="css/header.css" />
        <link rel="stylesheet" href="css/reset.css" />
        <link rel="shortcut icon" type="image/x-icon" href="favicon.ico" />
        <link href="https://fonts.googleapis.com/css?family=Rye" rel="stylesheet" />
        <link href="https://fonts.googleapis.com/css?family=Bungee" rel="stylesheet"> 
        <link href="https://fonts.googleapis.com/css?family=Slabo+27px" rel="stylesheet">
        
</head>';
	
$view = 'investView';
$footer = file_get_contents('includes/footer.php');
$header = file_get_contents('includes/header.php');
$viewPage = file_get_contents('includes/views/'.$view.'.php');
$page = '<!DOCTYPE html>
    <html lang=\'en\'>
       
        '.$head.'
       
    <body>
        
		'.$header.'
            
        <div id = "view">'.$viewPage.'</div>
        
        '.$footer.'
    </body>

    </html>';
	
	echo $page;
}

function buildStorePage() {

	$head =  '<head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Browse Our Titles</title>
        <script src="https://code.jquery.com/jquery-3.1.1.min.js" integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8=" crossorigin="anonymous"></script>
        <script type="text/javascript" src="js/analytics.js"></script>
        <script type="text/javascript" src="js/storeView.js"></script>
        <meta name="description" content="Old Manse Books is a one stop online book marketplace. We are still in the pre-revenue stages, building our site, adding inventory and seeking investors. Stay tuned for more updates" />
        <meta name="keywords" content="books, new books, used books, buy books, sell your books, store, retailer, bookstore" />
        <meta name="author" content="Tim Mattingly" />
        <link rel="stylesheet" href="css/global.css" />
        <link rel="stylesheet" href="css/storeView.css" />
        <link rel="stylesheet" href="css/footer.css" />
        <link rel="stylesheet" href="css/header.css" />
        <link rel="stylesheet" href="css/reset.css" />
        <link rel="shortcut icon" type="image/x-icon" href="favicon.ico" />
        <link href="https://fonts.googleapis.com/css?family=Rye" rel="stylesheet" />
        <link href="https://fonts.googleapis.com/css?family=Bungee" rel="stylesheet"> 
        <link href="https://fonts.googleapis.com/css?family=Slabo+27px" rel="stylesheet">
        
</head>';
	
$view = 'storeView';
$footer = file_get_contents('includes/footer.php');
$header = file_get_contents('includes/header.php');
$viewPage = file_get_contents('includes/views/'.$view.'.php');
$page = '<!DOCTYPE html>
    <html lang=\'en\'>
       
        '.$head.'
       
    <body>
        
		'.$header.'
            
        <div id = "view">'.$viewPage.'</div>
        
        '.$footer.'
    </body>

    </html>';
	
	echo $page;
}

function buildDetailPage(){
	
	$title = str_replace("/oldmansebooks/book/?","",$_SERVER['REQUEST_URI']);
	
	
	$head =  '<head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>'.$title.'</title>
        <script src="https://code.jquery.com/jquery-3.1.1.min.js" integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8=" crossorigin="anonymous"></script>
        <script type="text/javascript" src="../js/analytics.js"></script>
		<script type="text/javascript" src="../js/detailView.js"></script>
        <meta name="description" content="Old Manse Books is a one stop online book marketplace. We are still in the pre-revenue stages, building our site, adding inventory and seeking investors. Stay tuned for more updates" />
        <meta name="keywords" content="books, new books, used books, buy books, sell your books, store, retailer, bookstore" />
        <meta name="author" content="Tim Mattingly" />
        <link rel="stylesheet" href="../css/global.css" />
        <link rel="stylesheet" href="../css/footer.css" />
        <link rel="stylesheet" href="../css/header.css" />
        <link rel="stylesheet" href="../css/reset.css" />
		<link rel="stylesheet" href="../css/bookDetail.css" />
        <link rel="shortcut icon" type="image/x-icon" href="../favicon.ico" />
        <link href="https://fonts.googleapis.com/css?family=Rye" rel="stylesheet" />
        <link href="https://fonts.googleapis.com/css?family=Bungee" rel="stylesheet"> 
        <link href="https://fonts.googleapis.com/css?family=Slabo+27px" rel="stylesheet">
        
</head>';
	
$view = 'bookDetail';
$footer = file_get_contents('includes/footer.php');
$header = file_get_contents('includes/header.php');
$viewPage = file_get_contents('includes/views/'.$view.'.php');
$page = '<!DOCTYPE html>
    <html lang=\'en\'>
       
        '.$head.'
       
    <body>
        
		'.$header.'
            
        <div id = "view">'.$viewPage.'</div>
        
        '.$footer.'
    </body>

    </html>';
	
	echo $page;
	
}

?>