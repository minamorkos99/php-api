<?php
    class Covid{
        //DB staff
        private $conn;
        private $table ='covid_19';


        //table properties
        public $M1_ID;
        public $faver;
        public $tiredness;
        public $Dry_Cough;
        public $Difficulty_in_Breathing;
        public $Sore_Throat;
        public $None_Sympton;
        public $Pains;
        public $Nasal_Congestion;
        public $Runny_Nose;
        public $Diarrhea;
        public $None_Experiencing;
        public $Age_0_9;
        public $Age_10_19;
        public $Age_20_24;
        public $Age_25_59;
        public $Age_60;
        public $gender;
        public $color;







        public function __construct($db){
            $this->conn =$db;
        }


     
                
        public function read(){
            try {
                

                $query=' SELECT `M1_ID`, `faver`, `tiredness`, `Dry_Cough`, `Difficulty_in_Breathing`, `Sore_Throat`, `None_Sympton`, `Pains`, `Nasal_Congestion`, `Runny_Nose`, `Diarrhea`, `None_Experiencing`, `Age_0_9`, `Age_10_19`, `Age_20_24`, `Age_25_59`, `Age_60`, `gender`, `color` FROM `covid-19` ';
                                /* $query='SELECT
                                 `covid-19`.`#M1-ID`,
                                 `covid-19`.faver,
                                 `covid-19`.tiredness,
                                 `covid-19`.`Dry-Cough`,
                                 `covid-19`.`Difficulty-in-Breathing`,
                                 `covid-19`.`Sore-Throat`,
                                 `covid-19`.None_Sympton,
                                 `covid-19`.Pains,
                                 `covid-19`.`Nasal-Congestion`,
                                 `covid-19`.`Runny-Nose`,
                                 `covid-19`.Diarrhea,
                                 `covid-19`.None_Experiencing,
                                 `covid-19`.`Age_0-9`,
                                 `covid-19`.`Age_10-19`,
                                 `covid-19`.`Age_20-24`,
                                 `covid-19`.`Age_25-59`,
                                 `covid-19`.`Age_60+`,
                                 `covid-19`.gender,
                                 `covid-19`.color
                               FROM medical
                                 INNER JOIN `covid-19`
                                   ON medical.`Model-ID` = `covid-19`.`#M1-ID`';*/
                $stmt =$this->conn->prepare($query);
                        

                $stmt->execute();

                return $stmt;
            } catch (PDOExeption $e ) {
                echo 'there is a q error : ' .$e->getMassage();
                return false ;
             }                    
        }
          
       
        public function creat(){
            $query='INSERT INTO  '.$this->table.' SET M1_ID = :M1_ID,faver = :faver,tiredness = :tiredness,Dry_Cough = :Dry_Cough,Difficulty_in_Breathing = :Difficulty_in_Breathing,Sore_Throat = :Sore_Throat,None_Sympton = :None_Sympton,Pains = :Pains,Nasal_Congestion = :Nasal_Congestion,Runny_Nose = :Runny_Nose,Diarrhea = :Diarrhea,None_Experiencing = :None_Experiencing ,Age_0_9 = :Age_0_9,Age_20_24 = :Age_20_24,Age_25_59 = :Age_25_59,Age_10_19 = :Age_10_19,Age_60 = :Age_60,gender = :gender,color = :color';

            $stmt=$this->conn->prepare($query);


            //Convert special characters to HTML entities
            $this->M1_ID = htmlspecialchars(strip_tags($this->M1_ID));
            $this->faver = htmlspecialchars(strip_tags($this->faver));
            $this->tiredness = htmlspecialchars(strip_tags($this->tiredness));
            $this->Dry_Cough = htmlspecialchars(strip_tags($this->Dry_Cough));
            $this->Difficulty_in_Breathing = htmlspecialchars(strip_tags($this->Difficulty_in_Breathing));
            $this->Sore_Throat = htmlspecialchars(strip_tags($this->Sore_Throat));
            $this->None_Sympton = htmlspecialchars(strip_tags($this->None_Sympton));
            $this->Pains = htmlspecialchars(strip_tags($this->Pains));
            $this->Nasal_Congestion = htmlspecialchars(strip_tags($this->Nasal_Congestion));
            $this->Runny_Nose = htmlspecialchars(strip_tags($this->Runny_Nose));
            $this->Diarrhea = htmlspecialchars(strip_tags($this->Diarrhea));
            $this->None_Experiencing = htmlspecialchars(strip_tags($this->None_Experiencing));
            $this->Age_0_9 = htmlspecialchars(strip_tags($this->Age_0_9));
            $this->Age_20_24 = htmlspecialchars(strip_tags($this->Age_20_24));
            $this->Age_25_59 = htmlspecialchars(strip_tags($this->Age_25_59));
            $this->Age_10_19 = htmlspecialchars(strip_tags($this->Age_10_19));
            $this->Age_60 = htmlspecialchars(strip_tags($this->Age_60));
            $this->gender = htmlspecialchars(strip_tags($this->gender));
            $this->color = htmlspecialchars(strip_tags($this->color));

            //bind data 
            $stmt->bindParam(':M1_ID', $this->M1_ID);
            $stmt->bindParam(':faver', $this->faver);
            $stmt->bindParam(':tiredness', $this->tiredness);
            $stmt->bindParam(':Dry_Cough', $this->Dry_Cough);
            $stmt->bindParam(':Difficulty_in_Breathing', $this->Difficulty_in_Breathing);
            $stmt->bindParam(':Sore_Throat', $this->Sore_Throat);
            $stmt->bindParam(':None_Sympton', $this->None_Sympton);
            $stmt->bindParam(':Pains', $this->Pains);
            $stmt->bindParam(':Nasal_Congestion', $this->Nasal_Congestion);
            $stmt->bindParam(':Runny_Nose', $this->Runny_Nose);
            $stmt->bindParam(':Diarrhea', $this->Diarrhea);
            $stmt->bindParam(':None_Experiencing', $this->None_Experiencing);
            $stmt->bindParam(':Age_0_9', $this->Age_0_9);
            $stmt->bindParam(':Age_10_19', $this->Age_10_19);
            $stmt->bindParam(':Age_20_24', $this->Age_20_24);
            $stmt->bindParam(':Age_25_59', $this->Age_25_59);
            $stmt->bindParam(':Age_60', $this->Age_60);
            $stmt->bindParam(':gender', $this->gender);
            $stmt->bindParam(':color', $this->color);

            if($stmt->execute()){
                return true;
            }

          printf("Error: %s.\n", $stmt->error);
          return false;

        }

        public function update(){

            $query=' UPDATE  '.$this->table.' SET faver = :faver,tiredness = :tiredness,Dry_Cough = :Dry_Cough,Difficulty_in_Breathing = :Difficulty_in_Breathing,Sore_Throat = :Sore_Throat,None_Sympton = :None_Sympton,Pains = :Pains,Nasal_Congestion = :Nasal_Congestion,Runny_Nose = :Runny_Nose,Diarrhea = :Diarrhea,None_Experiencing = :None_Experiencing ,Age_0_9 = :Age_0_9,Age_20_24 = :Age_20_24,Age_25_59 = :Age_25_59,Age_10_19 = :Age_10_19,Age_60 = :Age_60,gender = :gender,color = :color WHERE M1_ID = :M1_ID';

                                
            
            
            $stmt=$this->conn->prepare($query);


            //Convert special characters to HTML entities
            $this->M1_ID = htmlspecialchars(strip_tags($this->M1_ID));
            $this->faver = htmlspecialchars(strip_tags($this->faver));
            $this->tiredness = htmlspecialchars(strip_tags($this->tiredness));
            $this->Dry_Cough = htmlspecialchars(strip_tags($this->Dry_Cough));
            $this->Difficulty_in_Breathing = htmlspecialchars(strip_tags($this->Difficulty_in_Breathing));
            $this->Sore_Throat = htmlspecialchars(strip_tags($this->Sore_Throat));
            $this->None_Sympton = htmlspecialchars(strip_tags($this->None_Sympton));
            $this->Pains = htmlspecialchars(strip_tags($this->Pains));
            $this->Nasal_Congestion = htmlspecialchars(strip_tags($this->Nasal_Congestion));
            $this->Runny_Nose = htmlspecialchars(strip_tags($this->Runny_Nose));
            $this->Diarrhea = htmlspecialchars(strip_tags($this->Diarrhea));
            $this->None_Experiencing = htmlspecialchars(strip_tags($this->None_Experiencing));
            $this->Age_0_9 = htmlspecialchars(strip_tags($this->Age_0_9));
            $this->Age_20_24 = htmlspecialchars(strip_tags($this->Age_20_24));
            $this->Age_25_59 = htmlspecialchars(strip_tags($this->Age_25_59));
            $this->Age_10_19 = htmlspecialchars(strip_tags($this->Age_10_19));
            $this->Age_60 = htmlspecialchars(strip_tags($this->Age_60));
            $this->gender = htmlspecialchars(strip_tags($this->gender));
            $this->color = htmlspecialchars(strip_tags($this->color));

            //bind data 
            $stmt->bindParam(':M1_ID', $this->M1_ID);
            $stmt->bindParam(':faver', $this->faver);
            $stmt->bindParam(':tiredness', $this->tiredness);
            $stmt->bindParam(':Dry_Cough', $this->Dry_Cough);
            $stmt->bindParam(':Difficulty_in_Breathing', $this->Difficulty_in_Breathing);
            $stmt->bindParam(':Sore_Throat', $this->Sore_Throat);
            $stmt->bindParam(':None_Sympton', $this->None_Sympton);
            $stmt->bindParam(':Pains', $this->Pains);
            $stmt->bindParam(':Nasal_Congestion', $this->Nasal_Congestion);
            $stmt->bindParam(':Runny_Nose', $this->Runny_Nose);
            $stmt->bindParam(':Diarrhea', $this->Diarrhea);
            $stmt->bindParam(':None_Experiencing', $this->None_Experiencing);
            $stmt->bindParam(':Age_0_9', $this->Age_0_9);
            $stmt->bindParam(':Age_10_19', $this->Age_10_19);
            $stmt->bindParam(':Age_20_24', $this->Age_20_24);
            $stmt->bindParam(':Age_25_59', $this->Age_25_59);
            $stmt->bindParam(':Age_60', $this->Age_60);
            $stmt->bindParam(':gender', $this->gender);
            $stmt->bindParam(':color', $this->color);
  
            if($stmt->execute()){
                return true;
            }

            
            printf("Error: %s.\n", $stmt->error);
            
            return false;

        }

        public function delete(){

            $query='DELETE  FROM ' . $this->table . ' WHERE M1_ID = :M1_ID';
                      
            $stmt=$this->conn->prepare($query);
           
            $this->M1ID = htmlspecialchars(strip_tags($this->M1_ID));
            
            $stmt->bindParam(':M1_ID', $this->M1_ID);

            
            if($stmt->execute()){
                return true;
            }

            printf("Error: %s.\n", $stmt->error);
           
            return false;

        }






    }
?>