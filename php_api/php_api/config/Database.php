<?php   
class Database {
    //DBparams
    private $host ="localhost";
    private $dbname="project";
    private $username ='mina';
    private $password ="123456";
    //private $charset="utf8mb4";

    private $conn;

    //DB conn
    public function connect() {
      $this->conn=null;
        
      try {
            
           $this->conn = new PDO('mysql:dbname=' .$this->dbname. ';host=' .$this->host , $this->username, $this->password);
          /* $dsn = 'mysql:dbname=testdb;host=127.0.0.1';
            $user = 'dbuser';
            $password = 'dbpass';
                $conn = new PDO("mysql:host=".$this->dbHost.";dbname=".$this->dbName, $this->dbUsername, $this->dbPassword);
                $pdo = new PDO('mysql:host=localhost;dbname=test', $user, $pass);
                    $this->conn = new PDO("mysql:host='.$this->host.', dbname='.$this->dbname', $this->username, $this->password");
                $conn -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                        $this->db = $conn;*/

            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

      } 
      catch (PDOEXCEPTION $m) { echo 'there is a connection error : '. $m->getMessage();}

      return $this->conn;



    }
}



  
  
  

?>