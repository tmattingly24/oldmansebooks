<?php 

require("../BOOK.php");



$BOOK = new BOOK($_POST);

$book = $BOOK->jsonD('book');

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
    
    echo "insert";   
}

else {
    
    echo "nope";
    
}

$auth = $book['author'];
$authArr = explode("/", $auth);
         

foreach($authArr as $author){
    
    $authExists = $BOOK->authExists($author);
    
    if($authExists){
        
        echo "insert";   
    }

    else {
    
        echo "nope";
    }   

}

?>

