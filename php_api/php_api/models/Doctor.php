<?php
    class Doctor{
        //DB staff
        private $conn;
        private $table ='doctor';


        //table properties
        public $Doctor_ID;
        public $name;
        public $specialist;       
        public $phone;      




        public function __construct($db){
            $this->conn =$db;
        }


     
                
        public function read(){
            try {
                $query=' SELECT `Doctor_ID`, `name`, `specialist`, `phone` FROM `doctor` ';
                /*$query='SELECT doctor.`Doctor-ID`,doctor.name,doctor.specialist,doctor.phone
                            FROM medical
                                INNER JOIN doctor
                                    ON medical.`Doctor-ID` = doctor.`Doctor-ID`'*/
                $stmt =$this->conn->prepare($query);
                        

                $stmt->execute();

                return $stmt;
            } catch (PDOExeption $e ) {
                echo 'there is a q error : ' .$e->getMassage();
                return false ;
             }                    
        }
          
       
        public function read_single(){
            $query='SELECT `fname`, `lname`, `username`, `password`, `status`, `DOB`, `gender`, `age`, `phone`, `address`, `email`, `photo`, `QR`, `ID` 
                                 FROM '.$this->table.' 
                                 WHERE ID=?';

            $stmt = $this->conn->prepare($query);
            
            /* Execute a prepared statement by binding PHP variables */
            $stmt->bindParam(1,$this->ID);

            $stmt->excute();

            $row = $stmt->fetch(PDO::FETCH_ASSOC);

            // Set properties

            $this->fname = $row['fname'];
            $this->lname = $row['lname'];
            $this->username = $row['username'];
            $this->password = $row['password'];
            $this->status = $row['status'];
            $this->DOB = $row['DOB'];
            $this->gender = $row['gender'];
            $this->age = $row['age'];
            $this->phone = $row['phone'];
            $this->address = $row['address'];
            $this->email = $row['email'];
            $this->photo = $row['photo'];
            $this->QR = $row['email'];
            $this->ID = $row['ID'];



        }
        
        public function creat(){
            $query='INSERT INTO  '.$this->table.' SET Doctor_ID=:Doctor_ID,name=:name,phone=:phone,specialist=:specialist';

            $stmt=$this->conn->prepare($query);


            //Convert special characters to HTML entities
            $this->name = htmlspecialchars(strip_tags($this->name));
           
            $this->phone = htmlspecialchars(strip_tags($this->phone));
            $this->specialist = htmlspecialchars(strip_tags($this->specialist));
            $this->Doctor_ID = htmlspecialchars(strip_tags($this->Doctor_ID));


            //bind data 
            $stmt->bindParam(":name", $this->name);
           
            $stmt->bindParam(':phone', $this->phone);
            $stmt->bindParam(':specialist', $this->specialist);

            $stmt->bindParam(':Doctor_ID', $this->Doctor_ID);


            if($stmt->execute()){
                return true;
            }

          printf("Error: %s.\n", $stmt->error);
          return false;

        }

        public function update(){

            $query=' UPDATE '.$this->table.' SET Doctor_ID=:Doctor_ID,name=:name,phone=:phone,specialist=:specialist';

            
            
            $stmt=$this->conn->prepare($query);


            $this->name = htmlspecialchars(strip_tags($this->name));
           
            $this->phone = htmlspecialchars(strip_tags($this->phone));
            $this->specialist = htmlspecialchars(strip_tags($this->specialist));
            $this->Doctor_ID = htmlspecialchars(strip_tags($this->Doctor_ID));


            //bind data 
            $stmt->bindParam(":name", $this->name);
           
            $stmt->bindParam(':phone', $this->phone);
            $stmt->bindParam(':specialist', $this->specialist);

            $stmt->bindParam(':Doctor_ID', $this->Doctor_ID);

            
            if($stmt->execute()){
                return true;
            }

            
            printf("Error: %s.\n", $stmt->error);
            
            return false;

        }

        public function delete(){

            $query='DELETE  FROM ' . $this->table . ' WHERE Doctor_ID = :Doctor_ID';
                      
            $stmt=$this->conn->prepare($query);
           
            $this->Doctor_ID = htmlspecialchars(strip_tags($this->Doctor_ID));
            
            $stmt->bindParam(':Doctor_ID', $this->Doctor_ID);

            
            if($stmt->execute()){
                return true;
            }

            printf("Error: %s.\n", $stmt->error);
           
            return false;

        }







    }
?>