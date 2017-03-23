<?php

require('BOOK.php');

$BOOK = new BOOK($_POST);
$title = $_POST['title'];
$bookDetail = $BOOK->getDetail($title);

echo $bookDetail;

?>