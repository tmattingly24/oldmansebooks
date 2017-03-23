<?php

require("BOOK.php");

$BOOK = new BOOK($_POST);

$book = $BOOK->randBook();


echo $book;



?>