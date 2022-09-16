<?php 
  // Headers
        header('Access-Control-Allow-Origin: *');
        header('Content-Type: application/json');
      
        include_once 'D:/New folder/htdocs/php_api/config/Database.php';
        include_once 'D:/New folder/htdocs/php_api/models/Covid-19.php';


        // Instantiate DB & connect
        $database = new Database();
        $db = $database->connect();

        // Instantiate blog post object
        $user = new Covid($db);

        // Blog post query
        $result = $user->read();
        // Get row count
        $num = $result->rowCount();


        if($num > 0) {
          // Post array
          $user_arr = array();
          $user_arr['data'] = array();
      
          while($row = $result->fetch(PDO::FETCH_ASSOC)) {
            extract($row);
      
            $user_item = array( 
              'M1_ID' =>$M1_ID,
              'faver' =>$faver,
              'tiredness' =>$tiredness,
              'Dry_Cough' =>$Dry_Cough ,
              'Difficulty_in_Breathing' =>$Difficulty_in_Breathing, 
              'Sore_Throat' =>$Sore_Throat,
              'None_Sympton' =>$None_Sympton,
              'Pains' =>$Pains,
              'Nasal_Congestion' =>$Nasal_Congestion,
              'Runny_Nose' =>$Runny_Nose,
              
              'None_Experiencing' =>$None_Experiencing,
              'Age_0_9' =>$Age_0_9,
              'Age_10_19' =>$Age_10_19,
              'Age_20_24' =>$Age_20_24,
              'Age_25_59' =>$Age_25_59,
              'Age_60' =>$Age_60,
              'gender' =>$gender,
              'color' =>$color
            );
      
            // Push to "data"
            array_push($user_arr['data'], $user_item);
            
            // array_push($posts_arr['data'], $post_item);
          
          }
          // Turn to JSON & output        
          echo json_encode($user_arr);
        }
       else {
        // No Posts
        echo json_encode(  array('message' => 'No Posts Found') );
      }
?>