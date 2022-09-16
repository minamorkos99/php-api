<?php
    class Medical{
        //DB staff
        private $conn;
        private $table ='medical';


        //table properties
        public $Hospital_ID;
        public $Model_ID;
        public $Doctor_ID;
        public $user_id;
        public $Bloodtype;
        public $last_update;
        public $M_ID;

        




        public function __construct($db){
            $this->conn =$db;
        }


     
                
        public function read(){
            try {
                
                                    $query='SELECT medical.Hospital_ID, medical.Model_ID,medical.Doctor_ID,medical.M_ID, medical.Bloodtype,medical.user_id,medical.last_update
                                            FROM medical';
                                                /*INNER JOIN hospital
                                                    ON medical.`Hospital-ID` = hospital.`Hos-ID`
                                                INNER JOIN doctor
                                                    ON medical.`Doctor-ID` = doctor.`Doctor-ID`
                                                INNER JOIN `covid-19`
                                                    ON medical.`Model-ID` = `covid-19`.`#M1-ID`
                                                INNER JOIN user
                                                    ON medical.`user-id` = user.ID';*/
           
                                      
                $stmt =$this->conn->prepare($query);
                        

                $stmt->execute();

                return $stmt;
            } catch (PDOExeption $e ) {
                echo 'there is a q error : ' .$e->getMassage();
                return false ;
             }                    
        }
          
       
        public function read_single(){
           /* $query='SELECT `fname`, `lname`, `username`, `password`, `status`, `DOB`, `gender`, `age`, `phone`, `address`, `email`, `photo`, `QR`, `ID` 
                                 FROM '.$this->table.' 
                                 WHERE ID=?';*/

            $stmt = $this->conn->prepare($query);
            
            /* Execute a prepared statement by binding PHP variables */
            $stmt->bindParam(1,$this->ID);

            $stmt->excute();

            $row = $stmt->fetch(PDO::FETCH_ASSOC);

            // Set properties

            $this->hospitalid = $row['Hospital-ID'];
            $this->modelid = $row['Model-ID'];
            $this->doctorid = $row['Doctor-ID'];
            $this->userid = $row['#User-ID'];            
            $this->bloodtybe = $row['Bloodtype'];
            $this->lastupddate = $row['last-update'];
         


        }
        
        public function creat(){
           // SELECT `Hospital_ID`, `Model_ID`, `Doctor_ID`, `M_ID`, `Bloodtype`, `last_update`, `user_id` 
            $query='INSERT INTO  '.$this->table.' SET Hospital_ID=:Hospital_ID,Model_ID=:Model_ID,M_ID=:M_ID,Doctor_ID=:Doctor_ID,user_id=:user_id, Bloodtype=:Bloodtype,last_update=:last_update';

            $stmt=$this->conn->prepare($query);


            //Convert special characters to HTML entities
            $this->Hospital_ID = htmlspecialchars(strip_tags($this->Hospital_ID));
            $this->Model_ID = htmlspecialchars(strip_tags($this->Model_ID));
            $this->Doctor_ID = htmlspecialchars(strip_tags($this->Doctor_ID));
            $this->user_id = htmlspecialchars(strip_tags($this->user_id));
            $this->Bloodtype = htmlspecialchars(strip_tags($this->Bloodtype));
            $this->last_update = htmlspecialchars(strip_tags($this->last_update));
            $this->M_ID = htmlspecialchars(strip_tags($this->M_ID));

         

            //bind data 
            $stmt->bindParam(":Hospital_ID", $this->Hospital_ID);
            $stmt->bindParam(":Model_ID", $this->Model_ID);
            $stmt->bindParam(":M_ID", $this->M_ID);
            $stmt->bindParam(":Doctor_ID", $this->Doctor_ID);
            $stmt->bindParam(":user_id", $this->user_id);
            $stmt->bindParam(":Bloodtype", $this->Bloodtype);
            $stmt->bindParam(":last_update", $this->last_update);
        

            if($stmt->execute()){
                return true;
            }

          printf("Error: %s.\n", $stmt->error);
          return false;

        }

        public function update(){

            $query='UPDATE ' . $this->table . ' SET Hospital_ID=:Hospital_ID,Model_ID=:Model_ID,Doctor_ID=:Doctor_ID, Bloodtype=:Bloodtype,last_update=:last_update,user_id=:user_id  WHERE M_ID = :M_ID';

            
            
            $stmt=$this->conn->prepare($query);


             //Convert special characters to HTML entities
             $this->Hospital_ID = htmlspecialchars(strip_tags($this->Hospital_ID));
             $this->Model_ID = htmlspecialchars(strip_tags($this->Model_ID));
             $this->Doctor_ID = htmlspecialchars(strip_tags($this->Doctor_ID));
             $this->user_id = htmlspecialchars(strip_tags($this->user_id));
             $this->Bloodtype = htmlspecialchars(strip_tags($this->Bloodtype));
             $this->last_update = htmlspecialchars(strip_tags($this->last_update));
             $this->M_ID = htmlspecialchars(strip_tags($this->M_ID));
 
          
 
             //bind data 
             $stmt->bindParam(":Hospital_ID", $this->Hospital_ID);
             $stmt->bindParam(":Model_ID", $this->Model_ID);
             $stmt->bindParam(":M_ID", $this->M_ID);
             $stmt->bindParam(":Doctor_ID", $this->Doctor_ID);
             $stmt->bindParam(":user_id", $this->user_id);
             $stmt->bindParam(":Bloodtype", $this->Bloodtype);
             $stmt->bindParam(":last_update", $this->last_update);
            
            if($stmt->execute()){
                return true;
            }

            
            printf("Error: %s.\n", $stmt->error);
            
            return false;

        }

        public function delete(){

            $query='DELETE  FROM ' . $this->table . ' WHERE M_ID = :M_ID';
                      
            $stmt=$this->conn->prepare($query);
           
            $this->M_ID = htmlspecialchars(strip_tags($this->M_ID));
            
            $stmt->bindParam(':M_ID', $this->M_ID);

            
            if($stmt->execute()){
                return true;
            }

            printf("Error: %s.\n", $stmt->error);
           
            return false;

        }






    }
?>