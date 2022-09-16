<?php 
  // Headers
  header('Access-Control-Allow-Origin: *');
  header('Content-Type: application/json');
  header('Access-Control-Allow-Methods: PUT');
  header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods, Authorization, X-Requested-With');

  include_once 'D:/New folder/htdocs/php_api/config/Database.php';
  include_once 'D:/New folder/htdocs/php_api/models/Doctor.php';

   // Instantiate DB & connect
   $database = new Database();
   $db = $database->connect();
 
   // Instantiate blog post object
   $user = new Doctor($db);
 
   // Get raw posted data
   $data = json_decode(file_get_contents("php://input"));

    
    $user->Doctor_ID = $data->Doctor_ID;
    $user->name = $data->name;
    $user->specialist = $data->specialist;
    $user->phone = $data->phone;
 


   if($user->update()) {
    echo json_encode(
      array('message' => 'Post Updated')
    );
  } else {
    echo json_encode(
      array('message' => 'Post Not Updated')
    );
  }

