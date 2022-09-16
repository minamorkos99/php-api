<?php 
  // Headers
  header('Access-Control-Allow-Origin: *');
  header('Content-Type: application/json');
  header('Access-Control-Allow-Methods: PUT');
  header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods, Authorization, X-Requested-With');

  include_once 'D:/New folder/htdocs/php_api/config/Database.php';
  include_once 'D:/New folder/htdocs/php_api/models/Medical.php';

   // Instantiate DB & connect
   $database = new Database();
   $db = $database->connect();
 
   // Instantiate blog post object
   $user = new Medical($db);
 
   // Get raw posted data
   $data = json_decode(file_get_contents("php://input"));

    
   $user->Hospital_ID = $data->Hospital_ID;
   $user->Model_ID = $data->Model_ID;
   $user->Doctor_ID = $data->Doctor_ID;
   $user->M_ID = $data->M_ID;
   $user->Bloodtype = $data->Bloodtype;

   $user->last_update = $data->last_update;
   
   $user->user_id = $data->user_id;


   if($user->update()) {
    echo json_encode(
      array('message' => 'Post Updated')
    );
  } else {
    echo json_encode(
      array('message' => 'Post Not Updated')
    );
  }

