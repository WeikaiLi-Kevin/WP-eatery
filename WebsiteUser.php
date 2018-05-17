<?php

class WebsiteUser{
    
    protected static $DB_HOST = "127.0.0.1";
    protected static $DB_USERNAME = "wp_eatery";
    protected static $DB_PASSWORD = "password";
    protected static $DB_DATABASE = "wp_eatery";
    
    private $username;
    private $password;
	private $adminID;
	private $lastLogin;
    private $mysqli;
    private $dbError;
    private $authenticated = false;
              
    function __construct (){
        $this->mysqli = new mysqli(self::$DB_HOST, self::$DB_USERNAME, 
                self::$DB_PASSWORD, self::$DB_DATABASE);
        if($this->mysqli->errno){
            $this->dbError = true;
        }else{
            $this->dbError = false;
        }
    }

    public function authenticate($username, $password){
        $loginQuery = "SELECT * FROM adminusers WHERE username = ? AND password = ?";
        $stmt = $this->mysqli->prepare($loginQuery);
        $stmt->bind_param('ss', $username, $password);
        $stmt->execute();
        $result = $stmt->get_result();
        if($result->num_rows == 1){
			
			$temp = $result->fetch_assoc();  			
            $this->username = $temp['Username'];
            $this->password = $temp['Password'];
			$this->adminID = $temp['AdminID'];
		//	$this->lastLogin = $temp['Lastlogin'];			
			$date = new DateTime($temp['Lastlogin']);
            $this->lastLogin = $date->format('m/d/y');
		
            $this->authenticated = true;
        }
        $stmt->free_result();
    }
    
    public function isAuthenticated(){
        return $this->authenticated;
    }
    
    public function hasDbError(){
        return $this->dbError;
    }
    
    public function getUsername(){
        return $this->username;
    }
    
	public function getAdminID(){
        return $this->adminID;
    }
    
	public function getLastlogin(){
        return $this->lastLogin;
    }
    
}

?>