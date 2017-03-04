<?php 

require("../BOOK.php");

$new = "new";
$old = "old";

$BOOK = new BOOK($_POST);

$book = $BOOK->jsonD('book');

$paths = $book['photos'];
$isbn = $book['isbn'];

$bookExists = $BOOK->bookExists($isbn);

if($bookExists) {
    
    $BOOK->addOne($book['isbn']);
    
}

else {
    
    $BOOK->insertBook($book);
    
}

$id = $BOOK->getBookID($isbn);

$pub = $book['publisher'];
$pubExists = $BOOK->pubExists($pub);


if($pubExists) {
    
    $BOOK->insertPub($pub,$id,$old);   
}

else if(!$pubExists){
    
    $BOOK->insertPub($pub,$id,$new);
    
}

$auth = $book['author'];
$authArr = explode("/", $auth);
         

foreach($authArr as $author){
    
    $authExists = $BOOK->authExists($author);
   
    if($authExists){
        
        $BOOK->insertAuth($author,$id,$old);  
    }

    else if(!$authExists) {
    
        $BOOK->insertAuth($author,$id,$new);
    }   

}

$BOOK->addImg($id,$paths);

$condition = $BOOK->getCondition($book['condition']);

$BOOK->createSKU($id,$condition,$book);



?>

