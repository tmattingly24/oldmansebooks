<?php

require("DB.php");

class BOOK {

    
 public function __construct($postOrGet) {

        $this->request = $postOrGet;

    }

    
    public function jsonD($obj) {
        
        $obj = json_decode($this->request[$obj], true);
        return $obj;

    }

    
    public function insertBook($book){

         $query = "INSERT INTO books (TITLE, ISBN, PUBDATE, GENREID, DESCRIPTION, EDITION, BINDING,QTY) VALUES ('".$book['title']."', '".$book['isbn']."', '".$book['pubDate']."', '".$book['genre']."', '".$book['description']."', '".$book['edition']."', '".$book['binding']."','1')";
        
         DB::executeQuery($query, false);
            
        echo "inserting book";


            }

    public function addOne($isbn){

        
         $query = "UPDATE books SET QTY = QTY +1  WHERE ISBN =  \"$isbn\"";
         DB::executeQuery($query, false);
        

    }
    
    public function jsonE($obj) {

        $obj = json_encode($this->request[$obj], true);

        return $obj;

    }
    
    public function bookExists($isbn){
        
         $query = "SELECT ISBN FROM books WHERE ISBN =  \"$isbn\"";
         $result = DB::executeQuery($query, true);
         $num_rows = mysql_num_rows($result);
        
            if ($num_rows > 0) {

                return true;
            }
            else { return false; }
            
    }
    
    
    public function pubExists($pub) {
        
         $query = "SELECT PUBNAME FROM publishers WHERE PUBNAME =  \"$pub\"";
         $result = DB::executeQuery($query, true);
         $num_rows = mysql_num_rows($result);
        
            if ($num_rows > 0) {

                return true;
            }
            else { return false; }
        
    }
    
    
    public function authExists($auth){
        
         $query = "SELECT AUTHNAME FROM authors WHERE AUTHNAME =  \"$auth\"";
         $result = DB::executeQuery($query, true);
         $num_rows = mysql_num_rows($result);
        
            if ($num_rows > 0) {

                return true;
            }
            else { return false; }
        
        
    }
    
    
    public function insertPub($pub,$id){
        
        
        
    }
    
    
     public function insertAuth($auth,$id){
        
     
        
    }
    
    public function getBookID($isbn){
        
        $query = "SELECT * FROM books WHERE ISBN =  \"$isbn\"";
        $result = DB::executeQuery($query, true);
       
        while ($row = mysql_fetch_assoc($result)) {
            foreach ($row as $col => $val) {
                if ($col == 'BOOKID') {
                    $id = $val;
                }
            }
        }
        
        return $id;
    }
    
}




?>