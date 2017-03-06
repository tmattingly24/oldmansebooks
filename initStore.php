<?php

require("BOOK.php");

$BOOK = new BOOK($_POST);
$offset = $_POST['offset'];
$book = $BOOK->initStore($offset);


echo $book;



?>