<?php

$view = $_POST['where'];

$page = file_get_contents('includes/views/'.$view.'.php');
echo $page;

?>