<?php
    class Hospital{
        //DB staff
        private $conn;
        private $table ='hospital';


        public $Hos_name;
        public $hos_phone;
        public $hos_add;
        public $Hos_ID;

        public function __construct($db){
            $this->conn =$db;
        }

        public function read(){
            try {
                
                $query=' SELECT Hos_ID, Hos_name, hos_add, hos_phone FROM '.$this->table.'  ';
                               /* $query='SELECT hospital.`Hos-ID`,hospital.`Hos-name`, hospital.`hos-add`,hospital.`hos-phone`
                                              FROM medical
                                              INNER JOIN hospital
                                                ON medical.`Hospital-ID` = hospital.`Hos-ID`';*/
                $stmt =$this->conn->prepare($query);
                        

                $stmt->execute();

                return $stmt;
            } catch (PDOExeption $e ) {
                echo 'there is a q error : ' .$e->getMassage();
                return false ;
             }                    
        }
          
        public function creat(){
            $query='INSERT INTO  '.$this->table.' SET Hos_name=:Hos_name,hos_phone=:hos_phone,hos_add=:hos_add,Hos_ID=:Hos_ID';
           // SELECT `Hos_ID`, `Hos_name`, `hos_add`, `hos_phone` FROM `hospital` WHERE 1
            $stmt=$this->conn->prepare($query);


            //Convert special characters to HTML entities
            $this->Hos_name = htmlspecialchars(strip_tags($this->Hos_name));
            $this->hos_phone = htmlspecialchars(strip_tags($this->hos_phone));
            $this->hos_add = htmlspecialchars(strip_tags($this->hos_add));
            $this->Hos_ID = htmlspecialchars(strip_tags($this->Hos_ID));


            //bind data 
            $stmt->bindParam(":Hos_name", $this->Hos_name);         
            $stmt->bindParam(':hos_phone', $this->hos_phone);
            $stmt->bindParam(':hos_add', $this->hos_add);
            $stmt->bindParam(':Hos_ID', $this->Hos_ID);


            if($stmt->execute()){
                return true;
            }

          printf("Error: %s.\n", $stmt->error);
          return false;

        }
        public function update(){

            $query=' UPDATE  '.$this->table.' SET Hos_name=:Hos_name,hos_phone=:hos_phone,hos_add=:hos_add where Hos_ID=:Hos_ID';

            
            
            $stmt=$this->conn->prepare($query);


            //Convert special characters to HTML entities
            $this->Hos_name = htmlspecialchars(strip_tags($this->Hos_name));
            $this->hos_phone = htmlspecialchars(strip_tags($this->hos_phone));
            $this->hos_add = htmlspecialchars(strip_tags($this->hos_add));
            $this->Hos_ID = htmlspecialchars(strip_tags($this->Hos_ID));


            //bind data 
            $stmt->bindParam(":Hos_name", $this->Hos_name);         
            $stmt->bindParam(':hos_phone', $this->hos_phone);
            $stmt->bindParam(':hos_add', $this->hos_add);
            $stmt->bindParam(':Hos_ID', $this->Hos_ID);


            
            if($stmt->execute()){
                return true;
            }

            
            printf("Error: %s.\n", $stmt->error);
            
            return false;

        }

        public function delete(){

            $query='DELETE  FROM ' . $this->table . ' WHERE Hos_ID = :Hos_ID';
                      
            $stmt=$this->conn->prepare($query);
           
            $this->Hos_ID = htmlspecialchars(strip_tags($this->Hos_ID));
            
            $stmt->bindParam(':Hos_ID', $this->Hos_ID);

            
            if($stmt->execute()){
                return true;
            }

            printf("Error: %s.\n", $stmt->error);
           
            return false;

        }


    }
?>