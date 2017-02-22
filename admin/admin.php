<?php require("../includes/config.php") ; ?>
    <!DOCTYPE html>
    <html lang='en'>

    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Welcome to Old Manse Books</title>
        <script src="https://code.jquery.com/jquery-3.1.1.min.js" integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8=" crossorigin="anonymous"></script>
        <script type="text/javascript" src="../js/analytics.js"></script>
        <script type="text/javascript" src="../js/frontPage.js"></script>
        <script type="text/javascript" src="../js/stickyHeader.js"></script>
        <meta name="description" content="Old Manse Books is a one stop online book marketplace. We are still in the pre-revenue stages, building our site, adding inventory and seeking investors. Stay tuned for more updates" />
        <meta name="keywords" content="books, new books, used books, buy books, sell your books, store, retailer, bookstore" />
        <meta name="author" content="Tim Mattingly" />
        <link rel="stylesheet" href="../css/global.css" />
        <link rel="shortcut icon" type="image/x-icon" href="favicon.ico" />
        <link href="https://fonts.googleapis.com/css?family=Rye" rel="stylesheet" />
        <link href="https://fonts.googleapis.com/css?family=Bungee" rel="stylesheet"> 
        <link href="https://fonts.googleapis.com/css?family=Slabo+27px" rel="stylesheet">
        </head>
       
    <body>
        <?php include("../includes/adminHead.php") ; ?>
        
            <div id = "adminMain">
        
                <div id = "leftAdminMain"><a class = "btn">Add Inventory</a>  <a class = "btn">View Sales</a><br>
                <a class = "btn">View Unshipped Orders</a><br>
                    <a class = "btn">View Something Else</a>
                
                                
                </div>
                <div id = "centerAdminMain"><a class = "btn">View Inventory</a>
                <a class = "btn">View Profits</a>
                
                
                </div>
                <div id = "rightAdminMain"><a class = "btn">View Site Stats</a>
                <a class = "btn">View Expenses</a>
                </div>
                
            </div>
            
        <?php include("../includes/footer.php") ?>
        
    </body>

    </html>