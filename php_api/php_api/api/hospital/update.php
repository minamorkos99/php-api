<?php 
  // Headers
  header('Access-Control-Allow-Origin: *');
  header('Content-Type: application/json');
  header('Access-Control-Allow-Methods: PUT');
  header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods, Authorization, X-Requested-With');

  include_once 'D:/New folder/htdocs/php_api/config/Database.php';
  include_once 'D:/New folder/htdocs/php_api/models/Hospital.php';

   // Instantiate DB & connect
   $database = new Database();
   $db = $database->connect();
 
   // Instantiate blog post object
   $user = new Hospital($db);
 
   // Get raw posted data
   $data = json_decode(file_get_contents("php://input"));

    
    $user->Hos_name = $data->Hos_name;
    $user->hos_phone = $data->hos_phone;
    $user->hos_add = $data->hos_add;
    $user->Hos_ID = $data->Hos_ID;
   


   if($user->update()) {
    echo json_encode(
      array('message' => 'Post Updated')
    );
  } else {
    echo json_encode(
      array('message' => 'Post Not Updated')
    );
  }

