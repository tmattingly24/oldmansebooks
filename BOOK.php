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
        
         $genre = $this->getGenre($book['genre']);
        
         $query = "INSERT INTO books (TITLE, ISBN, PUBDATE, GENREID, DESCRIPTION, EDITION, BINDING,QTY) VALUES ('".$book['title']."', '".$book['isbn']."', '".$book['pubDate']."', '".$genre."', '".$book['description']."', '".$book['edition']."', '".$book['binding']."','1')";
        
         DB::executeQuery($query, false);
            
        echo "Book Inserted";


            }

    public function addOne($isbn){

        
         $query = "UPDATE books SET QTY = QTY +1  WHERE ISBN =  \"$isbn\"";
         DB::executeQuery($query, false);
        
        echo "Book exists, added 1 to Qty";
    }
    
    public function jsonE($obj) {

        /*$obj = json_encode($this->request[$obj], true);*/
        $obj = json_encode($obj, true);

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
    
    
    public function insertPub($pub,$id,$newOrUpdate){
        
        if($newOrUpdate == "new"){
            
             $query = "INSERT INTO publishers(PUBNAME) VALUES ('".$pub."')";
             DB::executeQuery($query, false);
             $pubId = $this->getPubID($pub);
            
             $query = "INSERT INTO linkpubbooks(PUBID,BOOKID) VALUES ('".$pubId."','".$id."')";
             DB::executeQuery($query, false);
             
        } else if($newOrUpdate == "old"){
            
            $pubId = $this->getPubID($pub);
            $query = "INSERT INTO linkpubbooks(PUBID,BOOKID) VALUES ('".$pubId."','".$id."')";
            DB::executeQuery($query, false);
        }
        
        
    }
    
    
     public function insertAuth($auth,$id,$newOrUpdate){
        
         echo $newOrUpdate;
         
        if($newOrUpdate == "new"){
            
             echo "insert new author";
             $query = "INSERT INTO authors(AUTHNAME) VALUES ('".$auth."')";
             DB::executeQuery($query, false);
             $authId = $this->getAuthID($auth);
            
             $query = "INSERT INTO linkauthbooks(AUTHID,BOOKID) VALUES ('".$authId."','".$id."')";
             DB::executeQuery($query, false);
             
        } else if($newOrUpdate == "old"){
            
            echo "insert old author";
            $authId = $this->getAuthID($auth);
            $query = "INSERT INTO linkauthbooks(AUTHID,BOOKID) VALUES ('".$authId."','".$id."')";
            DB::executeQuery($query, false);
        }
            
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
    
     public function getAuthID($auth){
        
        $query = "SELECT * FROM authors WHERE AUTHNAME =  \"$auth\"";
        $result = DB::executeQuery($query, true);
       
        while ($row = mysql_fetch_assoc($result)) {
            foreach ($row as $col => $val) {
                if ($col == 'AUTHID') {
                    $id = $val;
                }
            }
        }
        
        return $id;
    }
    
    public function createSKU($id, $conditionId,$book) {
        
        $query = "INSERT INTO sku (BOOKID, CONDITIONID, SOLD, SHIPPED, PRICE) VALUES ('".$id."', '".$conditionId."', '0', '0', '".$book['price']."')";
        
         DB::executeQuery($query, false);
            
        echo "SKU Created";
        
    }
    
     public function getPubID($pub){
        
        $query = "SELECT * FROM publishers WHERE PUBNAME =  \"$pub\"";
        $result = DB::executeQuery($query, true);
       
        while ($row = mysql_fetch_assoc($result)) {
            foreach ($row as $col => $val) {
                if ($col == 'PUBID') {
                    $id = $val;
                }
            }
        }
        
        return $id;
    }
    
    public function addImg($id,$img){
        
        $imgArr = explode(",",$img);
        
        foreach($imgArr as $nextImg){
            
            $query = "INSERT INTO img(IMGPATH,BOOKID) VALUES ('".$nextImg."','".$id."')";
            DB::executeQuery($query,false);
        }
        
    }
    
    
    public function getCondition($condition) {
        
        $conditions = [ "1"=>"New",
                       "2"=>"Like New",
                       "3"=>"Very Good",
                       "4"=>"Good",
                       "5"=>"Fair",
                       "6"=>"Acceptable"
                        ];
            foreach($conditions as $id=>$cond){


                    if($condition == $cond){

                        $conditionId = $id;

                    }

            }

            return $conditionId;

        
        
    }
    
    public function getGenre($genre) {
        
         $genres = [ "1"=>"Fiction:Science Fiction",
                      "2"=>  "Fiction:Satire",
                       "3"=> "Fiction:Action and Adventure", 
                        "4"=>"Fiction:Drama",
                        "5"=>"Fiction:Mystery", 
                        "6"=>"Fiction:Romance",
                        "7"=>"Fiction:Satire" ,
                        "8"=>"Fiction:Horror" ,
                        "9"=>"Fiction:Children's",
                        "10"=>"Fiction:Religion Spirituality &amp; New Age", 
                        "11"=>"Fiction:Anthology",
                        "12"=>"Fiction:Poetry",
                        "13"=>"Fiction:Comics",
                        "14"=>"Fiction:Series",
                        "15"=>"Fiction:Trilogy",
                        "16"=>"Fiction:Fantasy",
                        "17"=>"Non-Fiction:Encyclopedia",
                        "18"=>"Non-Fiction:Dictionary",
                        "19"=>"Non-Fiction:Art",
                        "20"=>"Non-Fiction:Cookbook",
                        "21"=>"Non-Fiction:Diaries",
                        "22"=>"Non-Fiction:Journals",
                        "23"=>"Non-Fiction:Biography",
                        "24"=>"Non-Fiction:Autobiography",
                        "25"=>"Non-Fiction:Religion Spirituality &amp; New Age", 
                        "26"=>"Non-Fiction:Science",
                        "27"=>"Non-Fiction:History",
                        "28"=>"Non-Fiction:Math",
                        "29"=>"Non-Fiction:Self-Help",
                        "30"=>"Non-Fiction:Health" ,
                        "31"=>"Non-Fiction:How-to" ,
                        "32"=>"Non-Fiction:Travel",
                        "33"=>"Non-Fiction:Satire" 
                      ];
        
             foreach($genres as $id=>$gen){


                        if($genre == $gen){

                            $genreId = $id;

                        }

                }

                return $genreId;

        
        
        
    }
    
    
    public function initStore($offset) {
        
        $imgPrefix = "img/bookImg/";
        $query = "SELECT * FROM books INNER JOIN sku WHERE sku.BOOKID = books.BOOKID AND SOLD = 0 LIMIT 1";
        $result = DB::executeQuery($query, true);
        $edition = DB::parseResult($result,'EDITION');
        $isbn = DB::parseResult($result,'ISBN');
        $title = DB::parseResult($result, 'TITLE');
        $price = DB::parseResult($result, 'PRICE');
        $description = DB::parseResult($result, 'DESCRIPTION');
        $id = DB::parseResult($result, 'BOOKID');
        $pubDate = DB::parseResult($result, 'PUBDATE');
        $author = $this->getAuthNameById($id);
        $publisher = $this->getPubNameById($id);
        $img = $this->getImgById($id);
        
        $book = "<div class = \"topBookList\">
        <div class = \"img-container\" >$img<div class = \"underImg\"><img src = \"img/icons/glyphicons-225-chevron-left.png\">&nbsp;Next Image&nbsp;<img src = \"img/icons/glyphicons-224-chevron-right.png\"></div></div>
        <div class = \"bookListInfo column-center\"><ul>
        <li><span class=\"highlight\"><strong>$title</strong></span></li><br>
        <li>&nbsp;ISBN: $isbn</li>
        <li>&nbsp;By: $author</li>
        <li>&nbspPublished: $pubDate</li>
        <li>&nbspBy: $publisher</li>
        <li>&nbspEdition: $edition</li><br>
        <li><span class=\"price\"><strong>Price: $$price</strong></span></li><br>
        <li><h5><p></p>$description </p></h5><li>
        </ul><br><br>
        </div>
        </div>";
        
        return $book;
        
    }
    
   public function getAuthNameById($bookId){
        
       $query = "SELECT AUTHID FROM linkauthbooks WHERE BOOKID = \"$bookId\"";
       $result = DB::executeQuery($query, true);
       $authId = DB::parseResult($result,'AUTHID');
       $query = "SELECT AUTHNAME FROM authors WHERE AUTHID = \"$authId\"";
       $result = DB::executeQuery($query, true);
       $author = DB::parseResult($result,'AUTHNAME');
       
       if(is_array($author)){
           
           /*handle it*/
           
       }
 
       
       return $author;
        
        
        
    }
    
    public function getPubNameById($bookId){
        
       $query = "SELECT PUBID FROM linkpubbooks WHERE BOOKID = \"$bookId\"";
       $result = DB::executeQuery($query, true);
       $pubId = DB::parseResult($result,'PUBID');
       $query = "SELECT PUBNAME FROM publishers WHERE PUBID = \"$pubId\"";
       $result = DB::executeQuery($query, true);
       $pub = DB::parseResult($result,'PUBNAME');
       
       return $pub;
        
        
    }
    
    public function getImgById($bookId){
       
       $i = 0;
       $imgPrefix = "img/bookImg/";
        
       $query = "SELECT IMGPATH FROM img WHERE BOOKID = \"$bookId\"";
       $result = DB::executeQuery($query, true);
       $img = DB::parseResult($result,'IMGPATH');
        
        if(is_array($img)){
         
            foreach($img as $image){
                
                if($i == 0){
                
                    $returnImg = "<img class = \"listImg photo-frame\" src = \"$imgPrefix$image\"/>";
                    $i++;
                } else {
                    
                    $returnImg = $returnImg."<img class = \"listImg photo-frame hidden\" src = \"$imgPrefix$image\"/>";
                }
                
            }
        }
       
        if(!isset($returnImg)){
         
            $returnImg = $img;
            
        }
        
       return $returnImg;
        
        
    }
        
        
        
    
}





?>