    <!DOCTYPE html>
    <html lang='en'>

    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title> Old Manse Books (Admin) Add Inventory</title>
        <script src="https://code.jquery.com/jquery-3.1.1.min.js" integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8=" crossorigin="anonymous"></script>
        <script type="text/javascript" src="../js/analytics.js"></script>
        <script type="text/javascript" src="../js/frontPage.js"></script>
        <script type="text/javascript" src="../js/stickyHeader.js"></script>
        <script type="text/javascript" src="../js/saveBook.js"></script>
        <meta name="description" content="Old Manse Books is a one stop online book marketplace. We are still in the pre-revenue stages, building our site, adding inventory and seeking investors. Stay tuned for more updates" />
        <meta name="keywords" content="books, new books, used books, buy books, sell your books, store, retailer, bookstore" />
        <meta name="author" content="Tim Mattingly" />
        <link rel="stylesheet" href="../css/global.css" />
        <link rel="shortcut icon" type="image/x-icon" href="../favicon.ico" />
        <link href="https://fonts.googleapis.com/css?family=Rye" rel="stylesheet" />
        <link href="https://fonts.googleapis.com/css?family=Bungee" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Slabo+27px" rel="stylesheet">
    </head>

    <body>
        <?php include("../includes/adminHead.php") ; ?>

            <div id="adminMain">

                <form id="addInv" method="post">
                    Add New Book
                    <br>
                    <label>Title:</label>
                    <br>
                    <input type="text" id="title" name="title" />
                    <br>
                    <label>Genre:</label>
                    <br>
                    <input type="text" id="genre" name="genre" />
                    <br>
                    <label>ISBN:</label>
                    <br>
                    <input type="text" id="isbn" name="isbn" />
                    <br>
                    <label>Author(s) (Seperate with "/" ):
                        <br>
                    </label>
                    <input type="text" id="author" name="author" />
                    <br>
                    <label>Publisher:
                        <br>
                    </label>
                    <input type="text" id="publisher" name="publisher" />
                    <br>
                    <label>Publication Date:</label>
                    <br>
                    <input type="text" id="pubDate" name="pubDate" />
                    <br>
                    <label>Price:</label>
                    <br>
                    <input type="text" id="price" name="price" />
                    <br>
                    <label>Condition:</label>
                    <br>
                    <select id="condition" name="condition">
                        <option>New</option>
                        <option>Like New</option>
                        <option>Very Good</option>
                        <option>Good</option>
                        <option>Fair</option>
                        <option>Acceptable</option>
                    </select>
                    <br>
                    <label>Edition:</label>
                    <br>
                    <input type="text" id="edition" name="edition" />
                    <br>
                    <label>Binding:</label>
                    <br>
                    <select id="binding" name="binding">
                        <option>Paperback</option>
                        <option>Hardback</option>
                    </select>
                    <br>
                    <label>Images:</label>
                    <br>
                    <input id="fileSelect" name='images' type="file" multiple>
                    <br>
                    <label>Description:</label>
                    <br>
                    <textarea rows="12" cols="60" id="description" name="description"></textarea>
                    <br>

                    <br>

                    <input class="btn" type="submit" value="Save" />

                </form>

            </div>

            <?php include("../includes/footer.php") ?>

    </body>

    </html>