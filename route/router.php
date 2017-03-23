<?php

require('ROUTE.php');



//go to author detail page

ROUTE::get('author/?','authDetailRoute');

//go to book detail page

ROUTE::get('book/?','bookDetailRoute');

ROUTE::get('invest','investRoute');

ROUTE::get('store','storeRoute');

//go to store page

//ROUTE::get('');


//go to default welcome page must be last because all other routes are unmatched

ROUTE::get('/oldmansebooks/','');



?>