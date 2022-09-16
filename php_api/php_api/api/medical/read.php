<?php 
  // Headers
        header('Access-Control-Allow-Origin: *');
        header('Content-Type: application/json');
      
        include_once 'D:/New folder/htdocs/php_api/config/Database.php';
        include_once 'D:/New folder/htdocs/php_api/models/Medical.php';


        // Instantiate DB & connect
        $database = new Database();
        $db = $database->connect();

        // Instantiate blog post object
        $user = new Medical($db);


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
              'Hospital_ID' =>$Hospital_ID, 
              'Model_ID' =>$Model_ID,
              'M_ID' =>$M_ID,
              'Doctor_ID' =>$Doctor_ID,
              'user_id' =>$user_id,
              'Bloodtype'=>$Bloodtype,
              'last_update'=>$last_update
              
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