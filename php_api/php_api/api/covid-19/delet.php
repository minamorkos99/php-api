<?php 
  // Headers
  header('Access-Control-Allow-Origin: *');
  header('Content-Type: application/json');
  header('Access-Control-Allow-Methods: DELETE');
  header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods, Authorization, X-Requested-With');

  include_once 'D:/New folder/htdocs/php_api/config/Database.php';
  include_once 'D:/New folder/htdocs/php_api/models/Covid-19.php';

  // Instantiate DB & connect
  $database = new Database();
  $db = $database->connect();

  // Instantiate blog post object
  $user = new Covid($db);

  // Get raw posted data
  $data = json_decode(file_get_contents("php://input"));

  // Set ID to update
  $user->M1_ID = $data->M1_ID;

  // Delete post
  if($user->delete()) {
    echo json_encode(
      array('message' => 'Post Deleted')
    );
  } else {
    echo json_encode(
      array('message' => 'Post Not Deleted')
    );
  }

