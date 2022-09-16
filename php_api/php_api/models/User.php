<?php
    class User{
        //DB staff
        private $conn;
        private $table ='user';


        //table properties
        public $fname;
        public $lname;
        public $username;
        public $password;
        public $status;
        public $DOB;
        public $gender;
        public $age;
        public $phone;
        public $address;
        public $email;
        public $photo;
        public $QR;
        public $ID;




        public function __construct($db){
            $this->conn =$db;
        }


     
                
        public function read(){
            try {
                                                
                $query='SELECT user.fname,user.lname,user.username,user.passsword,user.sstatus,user.DOB,user.gender,user.age,user.phone,user.addresss,user.email,user.ID from '.$this->table.'';
                               /* $query='SELECT user.fname,user.lname,user.username,user.passsword,user.sstatus,user.DOB,user.gender,user.age,user.phone,user.addresss,user.email,user.ID
                                      FROM relative
                                        INNER JOIN user
                                          ON relative.`user-id` = user.ID
                                        INNER JOIN medical
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
            $query='INSERT INTO  '.$this->table.' SET fname=:fname,lname=:lname,username=:username,passsword=:passsword, sstatus=:sstatus,DOB=:DOB,gender=:gender,age=:age,phone=:phone,addresss=:addresss,email=:email,photo=:photo,QR=:QR,ID=:ID';

            $stmt=$this->conn->prepare($query);


            //Convert special characters to HTML entities
            $this->fname = htmlspecialchars(strip_tags($this->fname));
            $this->lname = htmlspecialchars(strip_tags($this->lname));
            $this->username = htmlspecialchars(strip_tags($this->username));
            $this->passsword = htmlspecialchars(strip_tags($this->passsword));
            $this->sstatus = htmlspecialchars(strip_tags($this->sstatus));
            $this->DOB = htmlspecialchars(strip_tags($this->DOB));
            $this->gender = htmlspecialchars(strip_tags($this->gender));
            $this->age = htmlspecialchars(strip_tags($this->age));
            $this->phone = htmlspecialchars(strip_tags($this->phone));
            $this->addresss = htmlspecialchars(strip_tags($this->addresss));
            $this->email = htmlspecialchars(strip_tags($this->email));
            $this->photo = htmlspecialchars(strip_tags($this->photo));
            $this->QR = htmlspecialchars(strip_tags($this->QR));
            $this->ID = htmlspecialchars(strip_tags($this->ID));


            //bind data 
            $stmt->bindParam(":fname", $this->fname);
            $stmt->bindParam(":lname", $this->lname);
            $stmt->bindParam(":username", $this->username);
            $stmt->bindParam(":passsword", $this->passsword);
            $stmt->bindParam(":sstatus", $this->sstatus);
            $stmt->bindParam(":DOB", $this->DOB);
            $stmt->bindParam(":gender", $this->gender);
            $stmt->bindParam(":age", $this->age);
            $stmt->bindParam(':phone', $this->phone);
            $stmt->bindParam(':addresss', $this->addresss);
            $stmt->bindParam(':email', $this->email);
            $stmt->bindParam(':photo', $this->photo);
            $stmt->bindParam(':QR', $this->QR);
            $stmt->bindParam(':ID', $this->ID);


            if($stmt->execute()){
                return true;
            }

          printf("Error: %s.\n", $stmt->error);
          return false;

        }

        public function update(){

            $query=' UPDATE ' . $this->table . '
                                SET fname=:fname,  
                                lname=:lname,
                                username=:username,
                                passsword=:passsword, 
                                sstatus=:sstatus,
                                DOB=:DOB,
                                gender=:gender,
                                age=:age,
                                phone=:phone,
                                addresss=:addresss,
                                email=:email,
                                photo=:photo,
                                QR=:QR
                                WHERE ID = :ID';
            
            
            $stmt=$this->conn->prepare($query);


            //Convert special characters to HTML entities
            $this->fname = htmlspecialchars(strip_tags($this->fname));
            $this->lname = htmlspecialchars(strip_tags($this->lname));
            $this->username = htmlspecialchars(strip_tags($this->username));
            $this->passsword = htmlspecialchars(strip_tags($this->passsword));
            $this->sstatus = htmlspecialchars(strip_tags($this->sstatus));
            $this->DOB = htmlspecialchars(strip_tags($this->DOB));
            $this->gender = htmlspecialchars(strip_tags($this->gender));
            $this->age = htmlspecialchars(strip_tags($this->age));
            $this->phone = htmlspecialchars(strip_tags($this->phone));
            $this->addresss = htmlspecialchars(strip_tags($this->addresss));
            $this->email = htmlspecialchars(strip_tags($this->email));
            $this->photo = htmlspecialchars(strip_tags($this->photo));
            $this->QR = htmlspecialchars(strip_tags($this->QR));
            $this->ID = htmlspecialchars(strip_tags($this->ID));


            //bind data 
            $stmt->bindParam(':fname', $this->fname);
            $stmt->bindParam(':lname', $this->lname);
            $stmt->bindParam(':username', $this->username);
            $stmt->bindParam(':passsword', $this->passsword);
            $stmt->bindParam(':sstatus', $this->sstatus);
            $stmt->bindParam(':DOB', $this->DOB);
            $stmt->bindParam(':gender', $this->gender);
            $stmt->bindParam(':age', $this->age);
            $stmt->bindParam(':phone', $this->phone);
            $stmt->bindParam(':addresss', $this->addresss);
            $stmt->bindParam(':email', $this->email);
            $stmt->bindParam(':photo', $this->photo);
            $stmt->bindParam(':QR', $this->QR);
            $stmt->bindParam(':ID', $this->ID);

            
            if($stmt->execute()){
                return true;
            }

            
            printf("Error: %s.\n", $stmt->error);
            
            return false;

        }

        public function delete(){

            $query='DELETE FROM ' . $this->table . ' WHERE ID = :ID';
                      
            $stmt=$this->conn->prepare($query);
           
            $this->ID = htmlspecialchars(strip_tags($this->ID));
            
            $stmt->bindParam(':ID', $this->ID);

            
            if($stmt->execute()){
                return true;
            }

            printf("Error: %s.\n", $stmt->error);
           
            return false;

        }






    }
?>