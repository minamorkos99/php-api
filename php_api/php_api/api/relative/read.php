<?php 
  // Headers
        header('Access-Control-Allow-Origin: *');
        header('Content-Type: application/json');
      
        include_once 'D:/New folder/htdocs/php_api/config/Database.php';
        include_once 'D:/New folder/htdocs/php_api/models/Rela.php';


        // Instantiate DB & connect
        $database = new Database();
        $db = $database->connect();

        // Instantiate blog post object
        $rela = new Relative($db);

        // Blog post query
        $result = $rela->read();
        // Get row count
        $num = $result->rowCount();


        if($num > 0) {
          // Post array
          $rela_arr = array();
          $rela_arr['data'] = array();
      
          while($row = $result->fetch(PDO::FETCH_ASSOC)) {
            extract($row);
          
            $rela_item = array(  
              'rname' =>$rname,               
              'bloodtype'=>$bloodtype,
              'gender' =>$gender,
              'age' =>$age,
              'phone' =>$phone,
              
              'user_Id' =>$user_Id,            
              'R_Id' =>$R_Id
            );
      
            // Push to "data"
            array_push($rela_arr['data'], $rela_item);
            
            // array_push($posts_arr['data'], $post_item);
          
          }
          // Turn to JSON & output        
          echo json_encode($rela_arr);
        }
       else {
        // No Posts
        echo json_encode(  array('message' => 'No Posts Found') );
      }
?>