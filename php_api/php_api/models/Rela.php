<?php
    class Relative{
        //DB staff
        private $conn;
        private $table ='relativ';


       
       //table properties
       public $rname;
       public $gender;
       public $age;
       public $phone;
       
       public $bloodtype;
       public $R_Id;
       public $user_Id;




        public function __construct($db){
            $this->conn =$db;
        }


     
                
        public function read(){
            try {
                
                $query=' SELECT `rname`, `age`, `gender`, `phone`, `bloodtype`, `addr`, `R_Id`, `user_Id` FROM `relativ` ';
                            //     $query='SELECT relativ.rname,relativ.age, relativ.gender,relativ.phone,relativ.bloodtype,relativ.addr,relativ.R_Id,relativ.userr_id FROM '.$this->table.' ';
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
            $query='INSERT INTO  '.$this->table.' SET rname=:rname,gender=:gender,age=:age,phone=:phone,bloodtype=:bloodtype,addr=:addr,R_Id=:R_Id,user_Id=:user_Id';

            $stmt=$this->conn->prepare($query);


            //Convert special characters to HTML entities
            $this->rname = htmlspecialchars(strip_tags($this->rname));
            $this->gender = htmlspecialchars(strip_tags($this->gender));
            $this->age = htmlspecialchars(strip_tags($this->age));
            $this->phone = htmlspecialchars(strip_tags($this->phone));
            $this->addr = htmlspecialchars(strip_tags($this->addr));
            $this->R_Id = htmlspecialchars(strip_tags($this->R_Id));
            $this->user_Id = htmlspecialchars(strip_tags($this->user_Id));
            $this->bloodtype = htmlspecialchars(strip_tags($this->bloodtype));




            //bind data 
            $stmt->bindParam(":rname", $this->rname);
            $stmt->bindParam(":gender", $this->gender);
            $stmt->bindParam(":age", $this->age);
            $stmt->bindParam(':phone', $this->phone);
            $stmt->bindParam(':addr', $this->addr);
            $stmt->bindParam(':bloodtype', $this->bloodtype);

            $stmt->bindParam(':R_Id', $this->R_Id);
            $stmt->bindParam(':user_Id', $this->user_Id);



            if($stmt->execute()){
                return true;
            }

          printf("Error: %s.\n", $stmt->error);
          return false;

        }

        public function update(){

            $query=' UPDATE ' . $this->table . '
                                SET name = name,
                                age = age,
                                gender = gender,
                                phone = phone,
                                bloodtype = bloodtype,
                                address = address,
                                
                                `user-id` = userid
                                WHERE Rid = :R-Id';
            
            
            $stmt=$this->conn->prepare($query);


            //Convert special characters to HTML entities
            $this->name = htmlspecialchars(strip_tags($this->name));
            $this->gender = htmlspecialchars(strip_tags($this->gender));
            $this->age = htmlspecialchars(strip_tags($this->age));
            $this->phone = htmlspecialchars(strip_tags($this->phone));
            $this->address = htmlspecialchars(strip_tags($this->address));
            $this->Rid = htmlspecialchars(strip_tags($this->Rid));
            $this->userid = htmlspecialchars(strip_tags($this->userid));



            //bind data 
            $stmt->bindParam(":name", $this->name);
            $stmt->bindParam(":gender", $this->gender);
            $stmt->bindParam(":age", $this->age);
            $stmt->bindParam(':phone', $this->phone);
            $stmt->bindParam(':address', $this->address);
            $stmt->bindParam(':R-ID', $this->Rid);
            $stmt->bindParam(':user-id', $this->userid);

            
            if($stmt->execute()){
                return true;
            }

            
            printf("Error: %s.\n", $stmt->error);
            
            return false;

        }

        public function delete(){

            $query='DELETE * FROM ' . $this->table . ' WHERE Mid = :M-ID';
                      
            $stmt=$this->conn->prepare($query);
           
            $this->id = htmlspecialchars(strip_tags($this->id));
            
            $stmt->bindParam(':M-ID', $this->Mid);

            
            if($stmt->execute()){
                return true;
            }

            printf("Error: %s.\n", $stmt->error);
           
            return false;

        }






    }
?>