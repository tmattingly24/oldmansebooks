<?php

require("BOOK.php");

$BOOK = new BOOK($_POST);
$resultsPer = 2;
$books = $BOOK->initStore($resultsPer);




?>