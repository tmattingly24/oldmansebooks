<?php


class DB {

    private $_connection;
    private static $_instance; 
	private $_host = "localhost";
	private $_username = "root";
	private $_password = "";
	private $_database = "oldmansebooks";
	

	public static function getInstance() {
		if(!self::$_instance) { // If no instance then make one
			self::$_instance = new self();
		}
		return self::$_instance;
	}
	// Constructor
	public function __construct() {
		$this->_connection = mysql_connect($this->_host, $this->_username, 
			$this->_password);
	   
        $this->select = mysql_select_db($this->_database);
		// Error handling
		if(mysql_error()) {
			trigger_error("Failed to conencto to MySQL: " . mysql_error(),
				 E_USER_ERROR);
		}
	}
	// Magic method clone is empty to prevent duplication of connection
	private function __clone() { }
	// Get mysqli connection
    
	public function getConnection() {
		return $this->_connection;
	}
    
    
    public function executeQuery($query, $wantResult) {
        
         $db = new DB();
         $mysql = $db->getConnection(); 
        
         if($wantResult = true) {
         $result = mysql_query($query);
         
             
             return $result;
             
         } else {
            mysql_query($query);
             
         }
        
    }
    
    
     public function parseResult($resultSet, $returnCol){
        
        $i = 0;
        if($returnCol == "all") {
          
            while ($row = mysql_fetch_array($resultSet)){
                foreach ($row as $col => $val){
                    
                    $rows[$col]=$val;
                }
                
                
            }
            return $rows;
            
        } else {
         
                while ($row = mysql_fetch_assoc($resultSet)) {
                foreach ($row as $col => $val) {
                    
                    if ($col == $returnCol) {
                        $return = $val;
                    }
                }
            }
            
            return $return;
            
            }

        }

}
           
           
           
           
           
           
           
           
           
           
           
           
           
           
    


?>